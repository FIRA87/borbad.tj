@extends('frontend.master')
@section('content')



<!-- Опросник -->
<section class="survey-section">
    <div class="container">
        <div class="survey-card">        

            @foreach ($survey->questions as $question)
                <div class="question-card">
                    <h5 class="question-title">{{ $question->text }}</h5>

                    @if ($question->options->isEmpty() && $question->type === 'text')
                        <form class="vote-form" data-question-id="{{ $question->id }}" method="post" action="javascript:void(0)" onsubmit="return false;">
                            @csrf
                            <textarea name="text_answer" class="survey-textarea" placeholder="Введите ваш ответ здесь..." required></textarea>
                            <button type="submit" class="vote-btn">@trans('send_button')</button>
                            <div class="vote-result" style="display:none"></div>
                        </form>
                    @else
                        <form class="vote-form" data-question-id="{{ $question->id }}" data-question-type="{{ $question->type }}" method="post" action="javascript:void(0)" onsubmit="return false;">
                            @csrf
                            <div class="options">
                                @foreach ($question->options as $opt)
                                    @if(($opt->type ?? 'choice') === 'text')
                                        <div class="option-item option-item--text mb-3">
                                            <label class="d-block small text-muted mb-1">{{ $opt->text }}</label>
                                            <textarea name="text_answers[{{ $opt->id }}]" class="survey-textarea" placeholder="{{ $opt->text }}" rows="2"></textarea>
                                        </div>
                                    @else
                                        @php $inputType = ($question->type === 'checkbox') ? 'checkbox' : 'radio'; @endphp
                                        <label class="option-label">
                                            <input type="{{ $inputType }}" name="option" value="{{ $opt->id }}" aria-label="{{ $opt->text }}">
                                            <span class="option-text">{{ $opt->text }}</span>
                                            <span class="option-count" data-option-id="{{ $opt->id }}">{{ $opt->answers()->count() }}</span>
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                            <button type="submit" class="vote-btn">@trans('vote')</button>
                            <div class="vote-result" style="display:none"></div>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Форма обратной связи -->
<section class="contact-section">
    <div class="container">
        <h2 class="contact-title">ОБРАЩЕНИЯ ГРАЖДАН И ОБРАТНАЯ СВЯЗЬ</h2>
        
        <div class="row">
            <div class="col-md-10 mx-auto">
                <form action="{{ route('contact_form_submit') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" 
                                   name="name" 
                                   class="contact-input" 
                                   placeholder="Ф.И.О"
                                   required>
                        </div>
                        <div class="col-md-6">
                            <input type="tel" 
                                   name="phone" 
                                   class="contact-input" 
                                   placeholder="Телефон"
                                   required>
                        </div>
                        <div class="col-md-12">
                            <input type="email" 
                                   name="email" 
                                   class="contact-input" 
                                   placeholder="Email"
                                   required>
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" 
                                      class="contact-textarea" 
                                      placeholder="Тема"
                                      required></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="contact-submit">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Голосование обрабатывается скриптом в master.blade.php (поддержка option_id + text_answers) --}}

@endsection