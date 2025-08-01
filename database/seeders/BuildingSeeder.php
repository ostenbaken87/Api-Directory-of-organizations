<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    public function run(): void
    {
        $buildings = [
            [
                'address' => 'г. Москва, ул. Ленина, д. 10, офис 5',
                'latitude' => 55.7558,
                'longitude' => 37.6176,
            ],
            [
                'address' => 'г. Санкт-Петербург, Невский пр., д. 25',
                'latitude' => 59.9343,
                'longitude' => 30.3351,
            ],
            [
                'address' => 'г. Екатеринбург, ул. Малышева, д. 51',
                'latitude' => 56.8389,
                'longitude' => 60.6057,
            ],
            [
                'address' => 'г. Новосибирск, Красный пр., д. 20',
                'latitude' => 55.0084,
                'longitude' => 82.9357,
            ],
            [
                'address' => 'г. Казань, ул. Баумана, д. 15',
                'latitude' => 55.7961,
                'longitude' => 49.1064,
            ],
        ];

        foreach ($buildings as $building) {
            Building::create($building);
        }

        $this->command->info('Создано ' . count($buildings) . ' тестовых зданий.');
    }
}
