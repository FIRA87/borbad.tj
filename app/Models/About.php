<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Контент страницы «О нас» (один экземпляр).
 * missions, histories, stats — JSON-массивы, приводятся к array.
 */
class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'title_ru', 'title_tj', 'title_en',
        'subtitle_ru', 'subtitle_tj', 'subtitle_en',
        'image',
        'missions', 'histories', 'stats', 'blocks',
    ];

    protected $casts = [
        'missions' => 'array',
        'histories' => 'array',
        'stats' => 'array',
        'blocks' => 'array',
    ];

    public static function blockKeys(): array
    {
        return [
            'construction_history' => 'История строительства',
            'architectural_features' => 'Особенности архитектуры',
            'architecture_structure' => 'Архитектура и структура',
            'cultural_heritage' => 'Культурное наследие',
            'technical_equipment' => 'Техническое оснащение',
            'reconstruction' => 'Реконструкция',
        ];
    }

    /**
     * Единственная запись страницы «О нас».
     */
    public static function getContent(): ?self
    {
        return static::first();
    }
}
