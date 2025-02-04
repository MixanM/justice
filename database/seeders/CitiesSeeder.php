<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CitiesSeeder extends Seeder
{
    public function run()
    {
        // Читаем файл с городами
        $filePath = storage_path('app/cities.html');
        $html = file_get_contents($filePath);

        // Используем регулярные выражения для извлечения данных
        preg_match_all('/<tr>.*?<td.*?>(.*?)<\/td>.*?<td.*?>.*?<\/td>.*?<td.*?>(.*?)<\/td>.*?<td.*?>(.*?)<\/td>/s', $html, $matches, PREG_SET_ORDER);

        $cities = [];

        foreach ($matches as $match) {
            $cityName = trim(strip_tags($match[2]));
            $regionName = trim(strip_tags($match[3]));

            // Ищем регион по имени
            $region = DB::table('regions')->where('name', $regionName)->first();

            if ($region) {
                $cities[] = [
                    'name' => $cityName,
                    'region_id' => $region->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Вставляем города в таблицу
        DB::table('cities')->insert($cities);
    }
}
