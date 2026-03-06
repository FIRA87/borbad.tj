<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $translations = [
            [
                'key' => 'about_page_title',
                'value_ru' => 'О нас - Борбад',
                'value_en' => 'About us - Borbad',
                'value_tj' => 'Дар бораи мо - Борбад',
                'group' => 'about',
                'description' => 'Страница О нас: заголовок вкладки браузера',
            ],
            [
                'key' => 'about_our_history',
                'value_ru' => 'Наша история',
                'value_en' => 'Our history',
                'value_tj' => 'Таърихи мо',
                'group' => 'about',
                'description' => 'Страница О нас: подпись над заголовком',
            ],
            [
                'key' => 'about_values',
                'value_ru' => 'Ценности',
                'value_en' => 'Values',
                'value_tj' => 'Арзишҳо',
                'group' => 'about',
                'description' => 'Страница О нас: подпись блока миссии',
            ],
            [
                'key' => 'about_our_mission',
                'value_ru' => 'Наша миссия',
                'value_en' => 'Our mission',
                'value_tj' => 'Миссияи мо',
                'group' => 'about',
                'description' => 'Страница О нас: заголовок блока миссии',
            ],
            [
                'key' => 'about_development_path',
                'value_ru' => 'Путь развития',
                'value_en' => 'Development path',
                'value_tj' => 'Роҳи рушд',
                'group' => 'about',
                'description' => 'Страница О нас: подпись блока истории',
            ],
            [
                'key' => 'about_development_history',
                'value_ru' => 'История развития',
                'value_en' => 'Development history',
                'value_tj' => 'Таърихи рушд',
                'group' => 'about',
                'description' => 'Страница О нас: заголовок блока истории',
            ],
            [
                'key' => 'about_mission_empty',
                'value_ru' => 'Блок миссии пока не заполнен. Заполните в ',
                'value_en' => 'Mission block is empty. Fill it in ',
                'value_tj' => 'Блоки миссия то ҳол пур нашудааст. Дар ',
                'group' => 'about',
                'description' => 'Страница О нас: пустой блок миссии',
            ],
            [
                'key' => 'about_admin_link',
                'value_ru' => 'админке',
                'value_en' => 'admin panel',
                'value_tj' => 'админка',
                'group' => 'about',
                'description' => 'Страница О нас: текст ссылки на админку',
            ],
            [
                'key' => 'about_history_empty',
                'value_ru' => 'Блок истории пока не заполнен.',
                'value_en' => 'History block is empty.',
                'value_tj' => 'Блоки таърих то ҳол пур нашудааст.',
                'group' => 'about',
                'description' => 'Страница О нас: пустой блок истории',
            ],
            [
                'key' => 'about_block_fill_admin',
                'value_ru' => 'Содержание блока можно заполнить в ',
                'value_en' => 'Block content can be filled in ',
                'value_tj' => 'Мундариҷаи блокро дар ',
                'group' => 'about',
                'description' => 'Страница О нас: подсказка заполнить блок',
            ],
            [
                'key' => 'about_in_admin_panel',
                'value_ru' => ' админ-панели.',
                'value_en' => ' admin panel.',
                'value_tj' => ' админка пур карда мешавад.',
                'group' => 'about',
                'description' => 'Страница О нас: окончание фразы про админку',
            ],
            [
                'key' => 'about_stats_empty',
                'value_ru' => 'Блок статистики пока не заполнен.',
                'value_en' => 'Statistics block is empty.',
                'value_tj' => 'Блоки омор то ҳол пур нашудааст.',
                'group' => 'about',
                'description' => 'Страница О нас: пустой блок статистики',
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
            'about_page_title', 'about_our_history', 'about_values', 'about_our_mission',
            'about_development_path', 'about_development_history',
            'about_mission_empty', 'about_admin_link', 'about_history_empty',
            'about_block_fill_admin', 'about_in_admin_panel', 'about_stats_empty',
        ])->delete();
    }
};
