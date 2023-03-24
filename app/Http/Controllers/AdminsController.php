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
        $admins = User::all()->where('id', '!=', auth()->user()->id);
     
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

    // Afficher le formaulaire me modification
    public function edit(User $user) {
        return view('admins.edit', [
            'admin' => $user,
            'current_page' => 'admins',
            'page_title' => 'Modifier un administrateur'
        ]);
    }

    // Mettre à jour les informations d'un administrateur
    public function update(Request $request, User $user) {
        // Vérifier si c'est l'utilisateur actuel est un admin
        if($user->role != 'admin') {
            abort(403, 'Unauthorized!');
        }

        $admin_fields = $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'adress' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'birth_date' => 'nullable|date',
            'cin' => 'nullable',
            'phone' => 'nullable'
        ]);

        dd($admin_fields['password']);

        // $job->update($form_feilds);        
        // return back()->with('success', 'Enregistrement modifié avec succès !');   

    }
}
