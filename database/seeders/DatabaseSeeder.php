<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@cargo',
            'password' => '$2a$12$2DzfjRoNzUQOTz8Yx1IZ6exlfWUAabB/ik/5Ke5jIIV1ix7ANStzC', //1234
        ]);
    }
}
