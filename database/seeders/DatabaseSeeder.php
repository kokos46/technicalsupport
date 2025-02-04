<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'user',
            'email' => 'test@example.com',
            'password'=>Hash::make('password')
        ]);

        User::factory()->create([
            'name'=>'manager',
            'email'=>'manager@example.com',
            'password'=>Hash::make('managerpass'),
            'status'=>'manager'
        ]);
    }
}
