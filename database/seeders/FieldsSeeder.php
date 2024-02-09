<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Helpers\FieldTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            [
                'name' => 'name',
                'type' => FieldTypes::STRING,
                'label' => 'Имя',
            ],
            [
                'name' => 'surname',
                'type' => FieldTypes::STRING,
                'label' => 'Фамилия',
            ],
            [
                'name' => 'middlename',
                'type' => FieldTypes::STRING,
                'label' => 'Отчество',
            ],
            [
                'name' => 'full_name',
                'type' => FieldTypes::STRING,
                'label' => 'ФИО',
            ],
            [
                'name' => 'birthday',
                'type' => FieldTypes::DATE,
                'label' => 'Дата рождения',
            ],
        ];

        foreach ($fields as $fieldData) {
            Field::query()->create($fieldData);
        }
    }
}
