<?php

namespace App\Services;

use App\Models\User;

class ServiceDash
{
    public function getWIdgetsInfos()
    {
        $nbr_admin = User::all()->where('role', '=', 'admin')->count();
        $nbr_teachers = User::all()->where('role', '=', 'teacher')->count();
        $nbr_students = User::all()->where('role', '=', 'student')->count();
        
        $data = [
            [
                'title' => 'Administrateurs',
                'count' => $nbr_admin,
                'icon' => 'fas fa-users-cog',
                'bg_color' => '#17a2b8',
                'route' => 'admins.get_all'
            ],
            [
                'title' => 'Enseignants',
                'count' => $nbr_teachers,
                'icon' => 'fas fa-users',
                'bg_color' => '#00a857',
                'route' => 'admins.get_all'
            ],
            [
                'title' => 'Etudiants',
                'count' => $nbr_students,
                'icon' => 'fas fa-users',
                'bg_color' => '#00a857',
                'route' => 'admins.get_all'
            ]
        ];
        
        return $data;
    }
}