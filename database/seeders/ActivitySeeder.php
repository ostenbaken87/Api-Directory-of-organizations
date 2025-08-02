<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        Activity::query()->delete();

        // 1. Родительские категории
        $food = Activity::create(['name' => 'Еда', 'level' => 1]);
        $cars = Activity::create(['name' => 'Автомобили', 'level' => 1]);

        $meat = Activity::create([
            'name' => 'Мясная продукция',
            'parent_id' => $food->id,
            'level' => 2,
        ]);

        $dairy = Activity::create([
            'name' => 'Молочная продукция',
            'parent_id' => $food->id,
            'level' => 2,
        ]);

        $trucks = Activity::create([
            'name' => 'Грузовые',
            'parent_id' => $cars->id,
            'level' => 2,
        ]);

        $passenger = Activity::create([
            'name' => 'Легковые',
            'parent_id' => $cars->id,
            'level' => 2,
        ]);

        Activity::create([
            'name' => 'Запчасти',
            'parent_id' => $passenger->id,
            'level' => 3,
        ]);

        Activity::create([
            'name' => 'Аксессуары',
            'parent_id' => $passenger->id,
            'level' => 3,
        ]);

        $this->command->info('Создано тестовое дерево Activity (3 уровня вложенности)');
    }
}
