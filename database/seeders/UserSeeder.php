<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Hash};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'       => 'Igor Marques',
            'email'      => 'igor@gmail.com',
            'password'   => Hash::make('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
