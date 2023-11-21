<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customers;
use App\Models\Employees;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = [
            ['name' => 'Klant',
                'email' => 'Klant@test.nl',
                'password' => bcrypt('123456'),
                'role' => 3,
            ],
            ['name' => 'Admin',
                'email' => 'admin@test.nl',
                'password' => bcrypt('123456'),
                'role' => 1,
            ],
            ['name' => 'employee',
                'email' => 'employee@test.nl',
                'password' => bcrypt('123456'),
                'role' => 2,
            ],

        ];
        foreach ($users as $user) {
            User::create($user);
        }

        Employees::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'address' => 'Admin',
            'city' => 'Admin',
            'phonenumber' => 'Admin',
            'user_id' => 2,
        ]);

        Customers::create([
            'firstname' => 'Klant',
            'lastname' => 'Klant',
            'email' => 'Klant@test.nl',
            'phonenumber' => 'Klant',
            'user_id' => 1,
        ]);

        $this->call([
            ProductsSeeder::class,
            RolesSeeder::class,

        ]);
    }
}
