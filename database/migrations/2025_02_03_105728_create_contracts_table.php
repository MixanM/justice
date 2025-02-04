<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->comment('Заказчик');
            $table->foreignId('executor_id')->nullable()->constrained('users')->comment('Исполнитель');
            $table->string('comment')->comment('Описание задачи')->nullable();
            $table->integer('price')->comment('Цена задачи')->nullable();
            $table->foreignId('city_id')->constrained('cities')->comment('Город');
            $table->timestamp('end_date')->nullable()->comment('Дата окончания');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
