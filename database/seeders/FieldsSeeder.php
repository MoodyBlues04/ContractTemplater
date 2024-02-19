<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Enums\FieldTypes;
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
                'name' => 'middle_name',
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
            [
                'name' => 'gender',
                'type' => FieldTypes::STRING, // TODO select dropdown (just generate inputs by field model)
                'label' => 'Гендер',          // TODO & one field for validation type, and one field for input data (type, options etc)
            ],
            [
                'name' => 'citizenship',
                'type' => FieldTypes::STRING,
                'label' => 'Гражданство',
            ],
            [
                'name' => 'expiration_date',
                'type' => FieldTypes::DATE,
                'label' => 'Дата истечения срока действия',
            ],
            [
                'name' => 'issue_date',
                'type' => FieldTypes::DATE,
                'label' => 'Дата выпуска',
            ],
            [
                'name' => 'subdivision',
                'type' => FieldTypes::STRING,
                'label' => 'Подразделение',
            ],
            [
                'name' => 'birth_place',
                'type' => FieldTypes::STRING,
                'label' => 'Место рождения',
            ],
            [
                'name' => 'passport_number',
                'type' => FieldTypes::INT,
                'label' => 'Номер паспорта',
            ],
            [
                'name' => 'passport_serial',
                'type' => FieldTypes::INT,
                'label' => 'Серия паспорта',
            ],
        ];

        foreach ($fields as $fieldData) {
            Field::query()->createOrFirst($fieldData);
        }
    }
}
