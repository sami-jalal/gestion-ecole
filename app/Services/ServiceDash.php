<?php

namespace App\Services;

use App\Models\User;

class ServiceDash
{
    public function getWIdgetsInfos()
    {
        $nbr_admin = User::all()->where('role', '=', 'admin')->count();
        $nbr_teacher = User::all()->where('role', '=', 'teacher')->count();
        $nbr_students = User::all()->where('role', '=', 'student')->count();
        
        $data = [
            [
                'title' => 'Administrateurs',
                'count' => $nbr_admin,
                'icon' => 'fas fa-users',
                'color' => '#00a857'
            ],
            [
                'title' => 'Enseignants',
                'count' => $nbr_teacher,
                'icon' => 'fas fa-users',
                'color' => '#00a857'
            ],
            [
                'title' => 'Etudiants',
                'count' => $nbr_students,
                'icon' => 'fas fa-users',
                'color' => '#00a857'
            ]
        ];
        
        return $data;
    }
}