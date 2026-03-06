<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Страница «О нас» — один контент-блок (заголовок, миссия, история, статистика).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru')->nullable();
            $table->string('title_tj')->nullable();
            $table->string('title_en')->nullable();
            $table->string('subtitle_ru')->nullable();
            $table->string('subtitle_tj')->nullable();
            $table->string('subtitle_en')->nullable();
            /** Миссия: массив [{title_ru, text_ru}, ...] */
            $table->json('missions')->nullable();
            /** История: массив [{year, title_ru, text_ru, side}, ...] */
            $table->json('histories')->nullable();
            /** Статистика: массив [{num, label_ru}, ...] */
            $table->json('stats')->nullable();
            $table->timestamps();
        });

        // Одна запись по умолчанию
        DB::table('about')->insert([
            'title_ru' => 'О театре',
            'title_tj' => 'Дар бораи театр',
            'title_en' => 'About the theatre',
            'subtitle_ru' => 'История, миссия и ценности театрально-концертного зала Борбад',
            'subtitle_tj' => null,
            'subtitle_en' => null,
            'missions' => json_encode([
                ['title_ru' => 'Культурное просвещение', 'text_ru' => 'Делаем искусство доступным для всех слоёв населения'],
                ['title_ru' => 'Поддержка искусства', 'text_ru' => 'Создаём платформу для талантливых артистов'],
                ['title_ru' => 'Культурный обмен', 'text_ru' => 'Объединяем традиции и современность'],
            ]),
            'histories' => json_encode([
                ['year' => '1985', 'title_ru' => 'Основание', 'text_ru' => 'Открытие театрально-концертного зала в центре Душанбе как культурного центра столицы', 'side' => 'left'],
                ['year' => '1998', 'title_ru' => 'Реконструкция', 'text_ru' => 'Масштабная модернизация зала с установкой современного оборудования', 'side' => 'right'],
                ['year' => '2010', 'title_ru' => 'Расширение', 'text_ru' => 'Добавление камерного зала и пространства для выставок', 'side' => 'left'],
                ['year' => (string) date('Y'), 'title_ru' => 'Сегодня', 'text_ru' => 'Ведущая культурная площадка с более чем 200 мероприятиями в год', 'side' => 'right'],
            ]),
            'stats' => json_encode([
                ['num' => '500+', 'label_ru' => 'Посадочных мест'],
                ['num' => '200+', 'label_ru' => 'Мероприятий в год'],
                ['num' => '40+', 'label_ru' => 'Лет истории'],
                ['num' => '50K+', 'label_ru' => 'Посетителей в год'],
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
