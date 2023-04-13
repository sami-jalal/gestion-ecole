<?php

namespace App\Services;

use App\Models\Course;
use App\Models\User;

class ServiceDash
{
    public function getWIdgetsInfos()
    {
        $nbr_admin = User::all()->where('role', '=', 'admin')->count();
        $nbr_teachers = User::all()->where('role', '=', 'teacher')->count();
        $nbr_students = User::all()->where('role', '=', 'student')->count();
        $nbr_courses = Course::all()->count();
        
        if(auth()->user()->role === "admin") {
            $data = [
                [
                    'title' => 'Administrateurs',
                    'count' => $nbr_admin,
                    'icon' => 'fas fa-users-cog',
                    'bg_color' => '#17a2b8',
                    'route' => 'users.get_all'
                ],
                [
                    'title' => 'Enseignants',
                    'count' => $nbr_teachers,
                    'icon' => 'fas fa-chalkboard-teacher',
                    'bg_color' => '#00a857',
                    'route' => 'users.get_all'
                ],
                [
                    'title' => 'Etudiants',
                    'count' => $nbr_students,
                    'icon' => 'fas fa-user-graduate',
                    'bg_color' => '#f58742',
                    'route' => 'users.get_all'
                ],
                [
                    'title' => 'Cours',
                    'count' => $nbr_courses,
                    'icon' => 'fas fa-book',
                    'bg_color' => '#aec724',
                    'route' => 'courses.get_all'
                ]
            ];
        } elseif (auth()->user()->role === "teacher") {
            $data = [
                [
                    'title' => 'Cours',
                    'count' => $nbr_courses,
                    'icon' => 'fas fa-book',
                    'bg_color' => '#aec724',
                    'route' => 'courses.get_all'
                ]
            ];
        }
        
        return $data;
    }
}