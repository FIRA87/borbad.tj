<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SurveyVoteController extends Controller
{
    /**
     * Приём ответов по опросу.
     * Поддерживается один вопрос с несколькими ответами:
     * - option_id — выбранный вариант типа "выбор" (radio/checkbox)
     * - text_answers — объект option_id => текст для вариантов типа "текст"
     * Уникальность: один ответ с одного IP на каждую опцию (question_id + user_ip + option_id).
     */
    public function vote(Request $request, $surveyId)
    {
        try {
            $data = $request->validate([
                'question_id' => 'required|exists:questions,id',
                'option_id' => 'nullable|exists:options,id',
                'text_answer' => 'nullable|string|max:2000',
                'text_answers' => 'nullable|array',
                'text_answers.*' => 'nullable|string|max:2000',
            ]);

            $question = Question::with('options')->findOrFail($data['question_id']);

            if ((int) $question->survey_id !== (int) $surveyId) {
                return response()->json([
                    'success' => false,
                    'status' => 'error',
                    'message' => 'Вопрос не относится к этому опросу',
                ], 422);
            }

            $ip = $request->ip();
            $optionId = $data['option_id'] ?? null;
            $textAnswers = $data['text_answers'] ?? [];
            $singleTextAnswer = isset($data['text_answer']) ? trim($data['text_answer']) : null;

            // Обратная совместимость: вопрос без опций или один текстовый ответ (старый формат)
            $options = $question->options;
            if ($options->isEmpty()) {
                if ($question->type === 'text' && $singleTextAnswer !== null && $singleTextAnswer !== '') {
                    $exists = Answer::where('question_id', $question->id)->where('user_ip', $ip)->exists();
                    if ($exists) {
                        return response()->json([
                            'success' => false,
                            'status' => 'error',
                            'message' => 'Вы уже голосовали по этому вопросу',
                        ], 422);
                    }
                    Answer::create([
                        'question_id' => $question->id,
                        'option_id' => null,
                        'text_answer' => $singleTextAnswer,
                        'user_ip' => $ip,
                    ]);
                    return $this->successResponse($question);
                }
                return response()->json([
                    'success' => false,
                    'status' => 'error',
                    'message' => 'Введите текстовый ответ',
                ], 422);
            }

            // Новый формат: опции с типами choice / text (null = старые записи, считаем choice)
            $choiceOptionIds = $options->filter(fn ($o) => ($o->type ?? 'choice') === 'choice')->pluck('id')->toArray();
            $textOptionIds = $options->filter(fn ($o) => ($o->type ?? '') === 'text')->pluck('id')->toArray();

            $toCreate = [];

            if ($optionId !== null) {
                $opt = $options->firstWhere('id', $optionId);
                if (!$opt || ($opt->type ?? 'choice') !== 'choice') {
                    return response()->json([
                        'success' => false,
                        'status' => 'error',
                        'message' => 'Выбранный вариант не относится к этому вопросу или не является вариантом выбора',
                    ], 422);
                }
                $toCreate[] = ['option_id' => (int) $optionId, 'text_answer' => null];
            }

            foreach ($textAnswers as $oid => $text) {
                $oid = (int) $oid;
                $text = is_string($text) ? trim($text) : '';
                if ($text === '') {
                    continue;
                }
                $opt = $options->firstWhere('id', $oid);
                if (!$opt || ($opt->type ?? '') !== 'text') {
                    continue;
                }
                $toCreate[] = ['option_id' => $oid, 'text_answer' => $text];
            }

            if (empty($toCreate)) {
                return response()->json([
                    'success' => false,
                    'status' => 'error',
                    'message' => 'Выберите вариант и/или заполните текстовые поля',
                ], 422);
            }

            // Один голос на вопрос с одного IP — при повторной попытке показываем toastr на фронте
            $alreadyVoted = Answer::where('question_id', $question->id)->where('user_ip', $ip)->exists();
            if ($alreadyVoted) {
                return response()->json([
                    'success' => false,
                    'status' => 'error',
                    'message' => 'Вы уже голосовали по этому вопросу',
                ], 422);
            }

            foreach ($toCreate as $item) {
                $exists = Answer::where('question_id', $question->id)
                    ->where('user_ip', $ip)
                    ->where('option_id', $item['option_id'])
                    ->exists();
                if (!$exists) {
                    Answer::create([
                        'question_id' => $question->id,
                        'option_id' => $item['option_id'],
                        'text_answer' => $item['text_answer'],
                        'user_ip' => $ip,
                    ]);
                }
            }

            return $this->successResponse($question);
        } catch (\Exception $e) {
            Log::error('Survey vote error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'status' => 'error',
                'message' => 'Произошла ошибка при обработке голоса',
            ], 500);
        }
    }

    private function successResponse(Question $question): \Illuminate\Http\JsonResponse
    {
        $total = $question->answers()->count();
        $counts = $question->options()->withCount('answers')->get()->map(function ($o) {
            return [
                'option_id' => $o->id,
                'option_text' => $o->text,
                'votes' => $o->answers_count,
            ];
        });

        return response()->json([
            'success' => true,
            'status' => 'ok',
            'message' => 'Спасибо за участие!',
            'question_id' => $question->id,
            'question_text' => $question->text,
            'total' => $total,
            'counts' => $counts->toArray(),
        ]);
    }
}
