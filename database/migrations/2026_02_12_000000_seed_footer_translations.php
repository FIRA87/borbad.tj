<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $translations = [
            [
                'key' => 'footer_description',
                'value_ru' => 'Театрально-концертный зал «Борбад» — культурное сердце Душанбе. Место, где оживают эмоции и рождается искусство.',
                'value_en' => 'Borbad Concert Hall is the cultural heart of Dushanbe. A place where emotions come alive and art is born.',
                'value_tj' => 'Залу консертии «Борбад» — дили фарҳангии Душанбе. Ҷойе, ки эҳсосот зинда мешаванд ва санъат ба дунё меояд.',
                'group' => 'footer',
                'description' => 'Футер: описание под логотипом',
            ],
            [
                'key' => 'footer_navigation',
                'value_ru' => 'Навигация',
                'value_en' => 'Navigation',
                'value_tj' => 'Навигатсия',
                'group' => 'footer',
                'description' => 'Футер: заголовок блока навигации',
            ],
            [
                'key' => 'footer_home',
                'value_ru' => 'Главная',
                'value_en' => 'Home',
                'value_tj' => 'Асосӣ',
                'group' => 'footer',
                'description' => 'Футер: пункт меню',
            ],
            [
                'key' => 'footer_afisha',
                'value_ru' => 'Афиша',
                'value_en' => 'Event Schedule',
                'value_tj' => 'Афиша',
                'group' => 'footer',
                'description' => 'Футер: пункт меню',
            ],
            [
                'key' => 'footer_about',
                'value_ru' => 'О нас',
                'value_en' => 'About us',
                'value_tj' => 'Дар бораи мо',
                'group' => 'footer',
                'description' => 'Футер: пункт меню',
            ],
            [
                'key' => 'footer_gallery',
                'value_ru' => 'Галерея',
                'value_en' => 'Gallery',
                'value_tj' => 'Галерея',
                'group' => 'footer',
                'description' => 'Футер: пункт меню',
            ],
            [
                'key' => 'footer_contacts',
                'value_ru' => 'Контакты',
                'value_en' => 'Contacts',
                'value_tj' => 'Тамос',
                'group' => 'footer',
                'description' => 'Футер: пункт меню и заголовок блока',
            ],
            [
                'key' => 'footer_working_hours',
                'value_ru' => 'Режим работы',
                'value_en' => 'Working hours',
                'value_tj' => 'Соати кор',
                'group' => 'footer',
                'description' => 'Футер: заголовок блока режима работы',
            ],
            [
                'key' => 'footer_weekdays',
                'value_ru' => 'Пн — Пт',
                'value_en' => 'Mon — Fri',
                'value_tj' => 'Дш — Ҷм',
                'group' => 'footer',
                'description' => 'Футер: будние дни',
            ],
            [
                'key' => 'footer_weekend',
                'value_ru' => 'Сб — Вс',
                'value_en' => 'Sat — Sun',
                'value_tj' => 'Шм — Яш',
                'group' => 'footer',
                'description' => 'Футер: выходные',
            ],
            [
                'key' => 'footer_box_note',
                'value_ru' => 'Касса работает за 1 час до начала мероприятия',
                'value_en' => 'Box office opens 1 hour before the event',
                'value_tj' => 'Касса 1 соат пеш аз оғози барнома кушода мешавад',
                'group' => 'footer',
                'description' => 'Футер: примечание о кассе',
            ],
            [
                'key' => 'footer_copyright',
                'value_ru' => 'Все права защищены',
                'value_en' => 'All rights reserved',
                'value_tj' => 'Ҳамаи ҳуқуқҳо ҳифз шудаанд',
                'group' => 'footer',
                'description' => 'Футер: копирайт',
            ],
            [
                'key' => 'footer_bottom_text',
                'value_ru' => 'Театрально-концертный зал «Борбад», г. Душанбе',
                'value_en' => 'Borbad Concert Hall, Dushanbe',
                'value_tj' => 'Залу консертии «Борбад», ш. Душанбе',
                'group' => 'footer',
                'description' => 'Футер: текст внизу',
            ],
            [
                'key' => 'footer_address_default',
                'value_ru' => 'г. Душанбе, Таджикистан',
                'value_en' => 'Dushanbe, Tajikistan',
                'value_tj' => 'ш. Душанбе, Тоҷикистон',
                'group' => 'footer',
                'description' => 'Футер: адрес по умолчанию (если не задан в настройках)',
            ],
        ];

        foreach ($translations as $t) {
            if (DB::table('static_translations')->where('key', $t['key'])->exists()) {
                continue;
            }
            DB::table('static_translations')->insert(array_merge($t, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }

    public function down(): void
    {
        DB::table('static_translations')->whereIn('key', [
            'footer_description', 'footer_navigation', 'footer_home', 'footer_afisha',
            'footer_about', 'footer_gallery', 'footer_contacts', 'footer_working_hours',
            'footer_weekdays', 'footer_weekend', 'footer_box_note', 'footer_copyright',
            'footer_bottom_text', 'footer_address_default',
        ])->delete();
    }
};
