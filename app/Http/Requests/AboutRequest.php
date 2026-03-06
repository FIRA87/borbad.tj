<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_ru' => 'nullable|string|max:255',
            'title_tj' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'subtitle_ru' => 'nullable|string|max:500',
            'subtitle_tj' => 'nullable|string|max:500',
            'subtitle_en' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'remove_image' => 'nullable|boolean',
            'missions' => 'nullable|array',
            'missions.*.title_ru' => 'nullable|string|max:255',
            'missions.*.title_tj' => 'nullable|string|max:255',
            'missions.*.title_en' => 'nullable|string|max:255',
            'missions.*.text_ru' => 'nullable|string|max:1000',
            'missions.*.text_tj' => 'nullable|string|max:1000',
            'missions.*.text_en' => 'nullable|string|max:1000',
            'histories' => 'nullable|array',
            'histories.*.year' => 'nullable|string|max:20',
            'histories.*.title_ru' => 'nullable|string|max:255',
            'histories.*.title_tj' => 'nullable|string|max:255',
            'histories.*.title_en' => 'nullable|string|max:255',
            'histories.*.text_ru' => 'nullable|string|max:1000',
            'histories.*.text_tj' => 'nullable|string|max:1000',
            'histories.*.text_en' => 'nullable|string|max:1000',
            'histories.*.side' => 'nullable|string|in:left,right',
            'stats' => 'nullable|array',
            'stats.*.num' => 'nullable|string|max:50',
            'stats.*.label_ru' => 'nullable|string|max:255',
            'stats.*.label_tj' => 'nullable|string|max:255',
            'stats.*.label_en' => 'nullable|string|max:255',
            'blocks' => 'nullable|array',
            'blocks.*.title_ru' => 'nullable|string|max:255',
            'blocks.*.title_tj' => 'nullable|string|max:255',
            'blocks.*.title_en' => 'nullable|string|max:255',
            'blocks.*.text_ru' => 'nullable|string|max:5000',
            'blocks.*.text_tj' => 'nullable|string|max:5000',
            'blocks.*.text_en' => 'nullable|string|max:5000',
        ];
    }
}
