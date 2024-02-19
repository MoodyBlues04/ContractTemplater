<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentTypes = [
            [
                'name' => 'passport',
                'fields' => [
                    'name',
                    'surname',
                    'middle_name',
                    'gender',
                    'citizenship',
                    'expiration_date',
                    'issue_date',
                    'subdivision',
                    'birth_place',
                    'passport_number',
                    'passport_serial',
                ],
            ],
        ];

        foreach ($documentTypes as $documentTypeData) {
            $fields = array_map(function ($fieldName) {
                return Field::query()->where('name', $fieldName)->firstOrFail()->id;
            }, $documentTypeData['fields']);

            /** @var DocumentType $documentType */
            $documentType = DocumentType::query()->createOrFirst(['name' => $documentTypeData['name']]);
            $documentType->fields()->detach();
            $documentType->fields()->attach($fields);
        }
    }
}
