<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::query()->where('email', 'test@test.com')->first()) {
            return;
        }
        User::query()->createOrFirst([
            'name' => 'test',
            'email' => 'test@test.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '88888888888',
            'password' => Hash::make('123456'),
            'is_admin' => false,
        ]);
    }
}
