<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
            ],
            [
                'name' => 'employee',
            ],
            [
                'name' => 'user',
            ],

        ];
        foreach ($roles as $role) {
            Roles::create($role);
        }
    }
}
