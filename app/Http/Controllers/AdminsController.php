<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminsController extends Controller
{
    // Récupérer le liste des administrateurs
    Public function get_all() {
        $admins = User::all();
     
        return view('admins.index', [
            'current_page' => 'admins',
            'page_title' => 'Gestion des administrateur',
            "admins" => $admins
        ]);
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        return view('admins.create', [
            'current_page' => 'admins',
            'page_title' => 'Ajouter un administrateur'
        ]);
    }

    // Ajouter un nouveau admin
    // Store a new job
    public function store(Request $request) {
        // dd($request);
        $admin_fields = $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'adress' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'birth_date' => 'nullable|date',
            'cin' => 'nullable',
            'phone' => 'nullable'
        ]);
        $admin_fields['role'] = 'admin';
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'adress' => $request->adress,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'cin' => $request->cin,
            'phone' => $request->phone,
            'role' => 'admin'
        ]);

        
        return redirect('/admins')->with('success', 'Enregistrement ajouté avec succès !');        
    }

    // public function store(Request $request) {
    //     $admin_fields = $request->validate([
    //         'name' => 'required',
    //         'email' => ['required', Rule::unique('users', 'email')],
    //         'password' => 'required|confirmed|min:6',
    //         'adress' => 'required',
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'birth_date' => 'required|date',
    //         'cin' => 'required'
    //     ]);
    //     $admin_fields['role'] = 'admin';
        
    //     User::create($admin_fields);
    
    //     return redirect('/admins')->with('success', 'Enregistrement ajouté avec succès !');        
    // }
}
