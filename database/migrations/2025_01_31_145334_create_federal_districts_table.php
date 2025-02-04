<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('federal_districts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название федерального округа');
            $table->string('capital')->comment('Административный центр');
            $table->timestamps();
        });

        // Заполняем федеральные округа
        DB::table('federal_districts')->insert([
            ['name' => 'Центральный', 'capital' => 'Москва'],
            ['name' => 'Северо-Западный', 'capital' => 'Санкт-Петербург'],
            ['name' => 'Приволжский', 'capital' => 'Нижний Новгород'],
            ['name' => 'Уральский', 'capital' => 'Екатеринбург'],
            ['name' => 'Сибирский', 'capital' => 'Новосибирск'],
            ['name' => 'Южный', 'capital' => 'Ростов-на-Дону'],
            ['name' => 'Северо-Кавказский', 'capital' => 'Пятигорск'],
            ['name' => 'Дальневосточный', 'capital' => 'Владивосток'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('federal_districts');
    }
};
