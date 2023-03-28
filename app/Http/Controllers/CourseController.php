<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function get_all() {

        return view('courses.index', [
            'current_page' => 'users',
            'page_title' => 'Gestion des utilisateur'
        ]);
    }

    
    public function create() {

        return view('courses.index', [
            'current_page' => 'users',
            'page_title' => 'Gestion des utilisateur'
        ]);
    }

    
    public function edit() {

        return view('courses.index', [
            'current_page' => 'users',
            'page_title' => 'Gestion des utilisateur'
        ]);
    }

    
    public function update() {

        return view('courses.index', [
            'current_page' => 'users',
            'page_title' => 'Gestion des utilisateur'
        ]);
    }
    
    public function store() {

        return view('courses.index', [
            'current_page' => 'users',
            'page_title' => 'Gestion des utilisateur'
        ]);
    }
    
    public function destroy() {

        return view('courses.index', [
            'current_page' => 'users',
            'page_title' => 'Gestion des utilisateur'
        ]);
    }
}
