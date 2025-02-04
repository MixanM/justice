<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->unsignedBigInteger('federal_district_id');
            $table->timestamps();

            $table->foreign('federal_district_id')->references('id')->on('federal_districts')->onDelete('cascade');
        });

        // Вставляем предварительные данные
        DB::table('regions')->insert([
            ['name' => 'Белгородская область', 'code' => '31', 'federal_district_id' => 1],
            ['name' => 'Брянская область', 'code' => '32', 'federal_district_id' => 1],
            ['name' => 'Владимирская область', 'code' => '33', 'federal_district_id' => 1],
            ['name' => 'Воронежская область', 'code' => '36', 'federal_district_id' => 1],
            ['name' => 'Ивановская область', 'code' => '37', 'federal_district_id' => 1],
            ['name' => 'Калужская область', 'code' => '40', 'federal_district_id' => 1],
            ['name' => 'Костромская область', 'code' => '44', 'federal_district_id' => 1],
            ['name' => 'Курская область', 'code' => '46', 'federal_district_id' => 1],
            ['name' => 'Липецкая область', 'code' => '48', 'federal_district_id' => 1],
            ['name' => 'Московская область', 'code' => '50', 'federal_district_id' => 1],
            ['name' => 'Орловская область', 'code' => '57', 'federal_district_id' => 1],
            ['name' => 'Рязанская область', 'code' => '62', 'federal_district_id' => 1],
            ['name' => 'Смоленская область', 'code' => '67', 'federal_district_id' => 1],
            ['name' => 'Тамбовская область', 'code' => '68', 'federal_district_id' => 1],
            ['name' => 'Тверская область', 'code' => '69', 'federal_district_id' => 1],
            ['name' => 'Тульская область', 'code' => '71', 'federal_district_id' => 1],
            ['name' => 'Ярославская область', 'code' => '76', 'federal_district_id' => 1],
            ['name' => 'Москва', 'code' => '77', 'federal_district_id' => 1],
            ['name' => 'Республика Карелия', 'code' => '10', 'federal_district_id' => 2],
            ['name' => 'Республика Коми', 'code' => '11', 'federal_district_id' => 2],
            ['name' => 'Архангельская область', 'code' => '29', 'federal_district_id' => 2],
            ['name' => 'Вологодская область', 'code' => '35', 'federal_district_id' => 2],
            ['name' => 'Калининградская область', 'code' => '39', 'federal_district_id' => 2],
            ['name' => 'Ленинградская область', 'code' => '47', 'federal_district_id' => 2],
            ['name' => 'Мурманская область', 'code' => '51', 'federal_district_id' => 2],
            ['name' => 'Новгородская область', 'code' => '53', 'federal_district_id' => 2],
            ['name' => 'Псковская область', 'code' => '60', 'federal_district_id' => 2],
            ['name' => 'Санкт-Петербург', 'code' => '78', 'federal_district_id' => 2],
            ['name' => 'Ненецкий автономный округ', 'code' => '83', 'federal_district_id' => 2],
            ['name' => 'Республика Башкортостан', 'code' => '02', 'federal_district_id' => 3],
            ['name' => 'Республика Марий Эл', 'code' => '12', 'federal_district_id' => 3],
            ['name' => 'Республика Мордовия', 'code' => '13', 'federal_district_id' => 3],
            ['name' => 'Республика Татарстан', 'code' => '16', 'federal_district_id' => 3],
            ['name' => 'Удмуртская Республика', 'code' => '18', 'federal_district_id' => 3],
            ['name' => 'Чувашская Республика', 'code' => '21', 'federal_district_id' => 3],
            ['name' => 'Пермский край', 'code' => '59', 'federal_district_id' => 3],
            ['name' => 'Кировская область', 'code' => '43', 'federal_district_id' => 3],
            ['name' => 'Нижегородская область', 'code' => '52', 'federal_district_id' => 3],
            ['name' => 'Оренбургская область', 'code' => '56', 'federal_district_id' => 3],
            ['name' => 'Пензенская область', 'code' => '58', 'federal_district_id' => 3],
            ['name' => 'Самарская область', 'code' => '63', 'federal_district_id' => 3],
            ['name' => 'Саратовская область', 'code' => '64', 'federal_district_id' => 3],
            ['name' => 'Ульяновская область', 'code' => '73', 'federal_district_id' => 3],
            ['name' => 'Курганская область', 'code' => '45', 'federal_district_id' => 4],
            ['name' => 'Свердловская область', 'code' => '66', 'federal_district_id' => 4],
            ['name' => 'Тюменская область', 'code' => '72', 'federal_district_id' => 4],
            ['name' => 'Челябинская область', 'code' => '74', 'federal_district_id' => 4],
            ['name' => 'Ханты-Мансийский автономный округ — Югра', 'code' => '86', 'federal_district_id' => 4],
            ['name' => 'Ямало-Ненецкий автономный округ', 'code' => '89', 'federal_district_id' => 4],
            ['name' => 'Республика Алтай', 'code' => '04', 'federal_district_id' => 5],
            ['name' => 'Республика Тыва', 'code' => '17', 'federal_district_id' => 5],
            ['name' => 'Республика Хакасия', 'code' => '19', 'federal_district_id' => 5],
            ['name' => 'Алтайский край', 'code' => '22', 'federal_district_id' => 5],
            ['name' => 'Красноярский край', 'code' => '24', 'federal_district_id' => 5],
            ['name' => 'Иркутская область', 'code' => '38', 'federal_district_id' => 5],
            ['name' => 'Кемеровская область', 'code' => '42', 'federal_district_id' => 5],
            ['name' => 'Новосибирская область', 'code' => '54', 'federal_district_id' => 5],
            ['name' => 'Омская область', 'code' => '55', 'federal_district_id' => 5],
            ['name' => 'Томская область', 'code' => '70', 'federal_district_id' => 5],
            ['name' => 'Республика Адыгея', 'code' => '01', 'federal_district_id' => 6],
            ['name' => 'Донецкая Народная Республика', 'code' => '80', 'federal_district_id' => 6],
            ['name' => 'Республика Калмыкия', 'code' => '08', 'federal_district_id' => 6],
            ['name' => 'Республика Крым', 'code' => '91', 'federal_district_id' => 6],
            ['name' => 'Луганская Народная Республика', 'code' => '88', 'federal_district_id' => 6],
            ['name' => 'Краснодарский край', 'code' => '23', 'federal_district_id' => 6],
            ['name' => 'Астраханская область', 'code' => '30', 'federal_district_id' => 6],
            ['name' => 'Волгоградская область', 'code' => '34', 'federal_district_id' => 6],
            ['name' => 'Запорожская область', 'code' => '93', 'federal_district_id' => 6],
            ['name' => 'Ростовская область', 'code' => '61', 'federal_district_id' => 6],
            ['name' => 'Херсонская область', 'code' => '94', 'federal_district_id' => 6],
            ['name' => 'Севастополь', 'code' => '92', 'federal_district_id' => 6],
            ['name' => 'Республика Дагестан', 'code' => '05', 'federal_district_id' => 7],
            ['name' => 'Республика Ингушетия', 'code' => '06', 'federal_district_id' => 7],
            ['name' => 'Кабардино-Балкарская Республика', 'code' => '07', 'federal_district_id' => 7],
            ['name' => 'Карачаево-Черкесская Республика', 'code' => '09', 'federal_district_id' => 7],
            ['name' => 'Республика Северная Осетия — Алания', 'code' => '15', 'federal_district_id' => 7],
            ['name' => 'Чеченская Республика', 'code' => '20', 'federal_district_id' => 7],
            ['name' => 'Ставропольский край', 'code' => '26', 'federal_district_id' => 7],
            ['name' => 'Республика Бурятия', 'code' => '03', 'federal_district_id' => 8],
            ['name' => 'Республика Саха (Якутия)', 'code' => '14', 'federal_district_id' => 8],
            ['name' => 'Забайкальский край', 'code' => '75', 'federal_district_id' => 8],
            ['name' => 'Камчатский край', 'code' => '41', 'federal_district_id' => 8],
            ['name' => 'Приморский край', 'code' => '25', 'federal_district_id' => 8],
            ['name' => 'Хабаровский край', 'code' => '27', 'federal_district_id' => 8],
            ['name' => 'Амурская область', 'code' => '28', 'federal_district_id' => 8],
            ['name' => 'Магаданская область', 'code' => '49', 'federal_district_id' => 8],
            ['name' => 'Сахалинская область', 'code' => '65', 'federal_district_id' => 8],
            ['name' => 'Еврейская автономная область', 'code' => '79', 'federal_district_id' => 8],
            ['name' => 'Чукотский автономный округ', 'code' => '87', 'federal_district_id' => 8],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
