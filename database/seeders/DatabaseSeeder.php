<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrateur',
                'email' => 'admin@mail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
                'first_name' => 'simo',
                'last_name' => 'simo',
                'cin' => 'az0000',
                'birth_date' => '1989-05-03',
                'adress' => 'Rabat',
                'phone' => '0682826143',
                'cne' => null, 
                'updated_at' => now(), 
                'created_at' => now()
            ],
            [
                'name' => 'Alami',
                'email' => 'alami@mail.com',
                'password' => Hash::make('123456'),
                'role' => 'teacher',
                'first_name' => 'Mohammed',
                'last_name' => 'Alami',
                'cin' => 'az0001',
                'birth_date' => '1989-05-03',
                'adress' => 'Rabat',
                'phone' => '0612121212',
                'cne' => null, 
                'updated_at' => now(), 
                'created_at' => now()
            ],
            [
                'name' => 'Alaoui',
                'email' => 'alaloui@mail.com',
                'password' => Hash::make('123456'),
                'role' => 'teacher',
                'first_name' => 'Nazha',
                'last_name' => 'Alaoui',
                'cin' => 'az0002',
                'birth_date' => '1989-05-03',
                'adress' => 'Rabat',
                'phone' => '0613131313',
                'cne' => null, 
                'updated_at' => now(), 
                'created_at' => now()
            ],
            [
                'name' => 'Sami',
                'email' => 'sami@mail.com',
                'password' => Hash::make('123456'),
                'role' => 'student',
                'first_name' => 'Sami',
                'last_name' => 'Jalal',
                'cin' => 'az0003',
                'birth_date' => '1990-08-23',
                'adress' => 'Casablanca',
                'phone' => '0613131313',
                'cne' => '1027536027', 
                'updated_at' => now(), 
                'created_at' => now()
            ],
            [
                'name' => 'Farid',
                'email' => 'farid@mail.com',
                'password' => Hash::make('123456'),
                'role' => 'student',
                'first_name' => 'farid',
                'last_name' => 'joseph',
                'cin' => 'az0004',
                'birth_date' => '1990-08-23',
                'adress' => 'Salé',
                'phone' => '0614141414',
                'cne' => '2058987085', 
                'updated_at' => now(), 
                'created_at' => now()
            ]
        ];

        $roles = [
            ['name' => 'Administrateur', 'code' => 'admin', 'updated_at' => now(), 'created_at' => now()],
            ['name' => 'Enseignant', 'code' => 'teacher', 'updated_at' => now(), 'created_at' => now()],
            ['name' => 'Etudiant', 'code' => 'student', 'updated_at' => now(), 'created_at' => now()]
        ];

        DB::table('users')->insert($users);
        DB::table('roles')->insert($roles);

        // foreach ($users as $user) {
        //     \App\Models\User::factory()->create([$user]);
        // }

        // foreach ($roles as $role) {
        //     \App\Models\Role::factory()->create($role);
        // }
    }
}
