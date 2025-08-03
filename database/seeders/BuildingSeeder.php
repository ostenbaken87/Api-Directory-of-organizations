<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    public function run(): void
    {

        $moscowBuildings = [
            [
                'address' => 'г. Москва, ул. Тверская, д. 10',
                'latitude' => 55.7601,
                'longitude' => 37.6065,
            ],
            [
                'address' => 'г. Москва, ул. Арбат, д. 25',
                'latitude' => 55.7500,
                'longitude' => 37.5900,
            ],
            [
                'address' => 'г. Москва, Пресненская наб., д. 8',
                'latitude' => 55.7480,
                'longitude' => 37.5390,
            ],
            [
                'address' => 'г. Москва, Ленинский пр-т, д. 32',
                'latitude' => 55.7000,
                'longitude' => 37.5700,
            ],
            [
                'address' => 'г. Москва, ул. Новый Арбат, д. 15',
                'latitude' => 55.7550,
                'longitude' => 37.5800,
            ]
        ];

        $otherCitiesBuildings = [
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

        // Создаем московские здания
        foreach ($moscowBuildings as $building) {
            Building::firstOrCreate(
                ['address' => $building['address']],
                $building
            );
        }

        // Создаем здания в других городах
        foreach ($otherCitiesBuildings as $building) {
            Building::firstOrCreate(
                ['address' => $building['address']],
                $building
            );
        }

        $total = Building::count();
        $this->command->info("Создано {$total} тестовых зданий (5 в Москве)");
    }
}
