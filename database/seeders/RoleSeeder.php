<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Guru',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Staff/Tata Usaha',
            'guard_name' => 'web'
        ]);
    }
}
