<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::query()->where('email', 'admin@admin.com')->first()) {
            return;
        }
        User::query()->createOrFirst([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+79999999999',
            'password' => Hash::make('123456'),
            'is_admin' => true,
        ]);
    }
}
