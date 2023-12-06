<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'title' => 'SuperAdmin'
        ]);

        Role::create([
            'title' => 'Admin',
        ]);
    }
}
