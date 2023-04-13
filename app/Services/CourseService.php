<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class CourseService
{
    public function get_courses_with_roles() {
        if(auth()->user()->role == 'admin') {
            // Administrateur
            $courses = DB::table('courses')
            ->join('users', 'users.id', '=', 'courses.user_id')
            ->select('courses.*', DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS author"))
            ->get();
        } else {  
            // Enseignant          
            $courses = DB::table('courses')
            ->join('users', 'users.id', '=', 'courses.user_id')
            ->select('courses.*', DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS author"))
            ->where('users.id', '=', auth()->user()->id)
            ->get();
        } 
        return $courses;
    }


    // Liste de cours pour les étudiants
    public function get_courses_for_students() {

        $courses = DB::table('courses')
        ->join('users', 'users.id', '=', 'courses.user_id')
        ->select('courses.*', DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS author"))
        ->get();
        
        return $courses;
    }
}

