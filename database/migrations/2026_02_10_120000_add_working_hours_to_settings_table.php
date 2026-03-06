<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Добавляет поля режима работы на страницу контактов.
 * Редактируются в админке: Настройки сайта.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('working_hours_weekdays', 100)->nullable()->after('youtube');
            $table->string('working_hours_weekend', 100)->nullable()->after('working_hours_weekdays');
            $table->string('working_hours_box', 255)->nullable()->after('working_hours_weekend');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'working_hours_weekdays',
                'working_hours_weekend',
                'working_hours_box',
            ]);
        });
    }
};
