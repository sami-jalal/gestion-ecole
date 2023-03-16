<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Administrateur',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'Administrateur',
            'code' => 'admin'
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'Enseignant',
            'code' => 'teacher'
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'Etudiant',
            'code' => 'student'
        ]);
    }
}
