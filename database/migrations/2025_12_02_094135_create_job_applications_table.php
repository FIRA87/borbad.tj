<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Пропускаем создание, если таблица уже есть (например, создана вручную или старым деплоем).
     */
    public function up(): void
    {
        if (Schema::hasTable('job_applications')) {
            return;
        }

        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
          
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            
            // Личные данные
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            
            // Дополнительная информация
            $table->text('cover_letter')->nullable();
            $table->string('resume'); // путь к файлу резюме
            $table->json('additional_files')->nullable(); // дополнительные файлы
            
            // Статус заявки
            $table->enum('status', ['new', 'reviewed', 'accepted', 'rejected'])->default('new');
            $table->text('admin_notes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
