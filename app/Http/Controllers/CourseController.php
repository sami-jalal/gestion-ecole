<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function get_all() {
        $courses = DB::table('courses')
        ->join('users', 'users.id', '=', 'courses.user_id')
        ->select('courses.*', DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS author"))
        ->get();
        
        return view('courses.index', [
            'courses' => $courses,
            'current_page' => 'courses',
            'page_title' => 'Gestion des cours'
        ]);
    }

    
    public function create() {

        return view('courses.create', [
            'current_page' => 'courses',
            'page_title' => 'Gestion des cours'
        ]);
    }

    public function store(Request $request) {

        $course_feilds = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        if($request->file('file')){
            $course_feilds['file'] = $request->file('file')->store('documents', 'public');
        }

        $course_feilds['user_id'] = auth()->id();

        Course::create($course_feilds);

        return redirect('/courses')->with('success', 'Enregistrement ajouté avec succès !'); 
    }
    
    public function edit() {

        return view('courses.index', [
            'current_page' => 'courses',
            'page_title' => 'Gestion des cours'
        ]);
    }

    
    public function update() {

        return view('courses.index', [
            'current_page' => 'courses',
            'page_title' => 'Gestion des cours'
        ]);
    }
    
    public function destroy() {

        return view('courses.index', [
            'current_page' => 'courses',
            'page_title' => 'Gestion des utilisateur'
        ]);
    }
}
