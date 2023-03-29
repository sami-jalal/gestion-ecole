<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    // Les rôles autorisés à effectuer les crud
    private $allowed_roles;

    public function __construct()
    {
        $this->allowed_roles = ['admin', 'teacher'];      
    }

    public function get_all() {
       
        // Le rôle admin autorise la visualisation de tout les cours
        if(auth()->user()->role == 'admin') {
            $courses = DB::table('courses')
            ->join('users', 'users.id', '=', 'courses.user_id')
            ->select('courses.*', DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS author"))
            ->get();
        } else {            
            $courses = DB::table('courses')
            ->join('users', 'users.id', '=', 'courses.user_id')
            ->select('courses.*', DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS author"))
            ->where('users.id', '=', auth()->user()->id)
            ->get();
        }
       
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
    

    public function edit(Course $course) {
        
        return view('courses.edit', [
            'course' => $course,
            'current_page' => 'courses',
            'page_title' => 'Gestion des cours'
        ]);
    }

    
    public function update(Request $request, Course $course) {

        $course_feilds = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        if($request->file('file')){
            $course_feilds['file'] = $request->file('file')->store('documents', 'public');
        }

        $course->update($course_feilds);
        return back()->with('success', 'Enregistrement modifié avec succès !');
    }
    
    public function destroy(Course $course) {
        // Vérifier si c'est l'utilisateur actuel est un user
        if(in_array(auth()->user()->role, $this->allowed_roles)) {
            abort(403, 'Non autorisé!');
        }

        $course->delete();
        return redirect('/courses')->with('success', 'Enregistrement supprimer avec succès !');
    }

    // Afficher les cours pour les étudiants
    public function my_courses() {
        $courses = DB::table('courses')
        ->join('users', 'users.id', '=', 'courses.user_id')
        ->select('courses.*', DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS author"))
        ->get();

        return view('courses.mycourses', [
            'courses' => $courses,
            'current_page' => 'courses',
            'page_title' => 'Gestion des cours'
        ]);
    }
}
