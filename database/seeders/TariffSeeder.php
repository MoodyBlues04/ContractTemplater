<?php

namespace Database\Seeders;

use App\Models\Helpers\TariffOptions;
use App\Models\Tariff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tariffs = [
            [
                'name' => 'basic',
                'price' => 1000,
                'options' => [
                    TariffOptions::DOCS_LOAD => 10,
                    TariffOptions::CONTRACT_GENERATIONS => 2,
                ],
            ],
            [
                'name' => 'medium',
                'price' => 5000,
                'options' => [
                    TariffOptions::DOCS_LOAD => 20,
                    TariffOptions::CONTRACT_GENERATIONS => 10,
                ],
            ],
            [
                'name' => 'premium',
                'price' => 10000,
                'options' => [
                    TariffOptions::DOCS_LOAD => 40,
                    TariffOptions::CONTRACT_GENERATIONS => 30,
                ],
            ],
        ];
        foreach ($tariffs as $tariff) {
            Tariff::query()->create($tariff);
        }
    }
}
