<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Activity;
use App\Models\Building;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::query()->delete();

        $buildings = Building::all();
        $activities = Activity::all();

        if ($buildings->isEmpty() || $activities->isEmpty()) {
            $this->command->error('Необходимо сначала создать Building и Activity!');
            return;
        }

        $companies = [
            ['name' => 'ООО Рога и Копыта'],
            ['name' => 'ЗАО Коасный Квадрат'],
            ['name' => 'ИП Иванов'],
            ['name' => 'ОАО СеверСталь'],
            ['name' => 'ООО АйтиТехнологии'],
            ['name' => 'ИП Петрова'],
            ['name' => 'ООО ФармГарант'],
            ['name' => 'АПК АгроПром'],
            ['name' => 'ООО МедТехника'],
            ['name' => 'ИП Соловьёв']
        ];

        foreach ($companies as $companyData) {

            $company = Company::create([
                'name' => $companyData['name'],
                'building_id' => $buildings->random()->id
            ]);

            $phoneCount = rand(1, 3);
            $phones = [];
            for ($i = 0; $i < $phoneCount; $i++) {
                $phones[] = [
                    'number' => '+7 ' . rand(900, 999) . ' ' . rand(100, 999) . '-' . rand(10, 99) . '-' . rand(10, 99)
                ];
            }
            $company->phones()->createMany($phones);

            $company->activities()->attach(
                $activities->random(rand(1, 3))->pluck('id')
            );
        }

        $this->command->info('Создано 10 тестовых компаний с телефонами и видами деятельности');
    }
}
