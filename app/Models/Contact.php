<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $guarded = [];

    public static function subjectLabels(): array
    {
        return [
            'tickets'     => 'Покупка билетов',
            'cooperation' => 'Сотрудничество',
            'rent'        => 'Аренда зала',
            'general'     => 'Общие вопросы',
            'other'       => 'Другое',
        ];
    }

    public function getSubjectLabelAttribute(): string
    {
        if (!$this->subject) {
            return '—';
        }
        $labels = static::subjectLabels();
        return $labels[$this->subject] ?? $this->subject;
    }
}
