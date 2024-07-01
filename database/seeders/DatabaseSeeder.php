<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@local.test',
            'password' => Hash::make('password'),
            'email_verified_at'=> Carbon::now()
        ]);

        \App\Models\Role::create([
            'name' => 'administrator'
        ]);
    }
}
