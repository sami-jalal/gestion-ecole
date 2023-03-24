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
         // Vérifier si c'est l'utilisateur actuel est un admin
         if(auth()->user()->role != 'admin') {
            abort(403, 'Non autorisé!');
        }

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
        $admin_fields['password'] = Hash::make($request->password);
        $admin_fields['role'] = 'admin';

        User::create($admin_fields);
        
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
        if(auth()->user()->role != 'admin') {
            abort(403, 'Non autorisé!');
        }

        $admin_fields = $request->validate([
            'name' => 'required',
            'email' => ['required'],
            'adress' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'birth_date' => 'nullable|date',
            'cin' => 'nullable',
            'phone' => 'nullable'
        ]); 
        
        // Vérifier s'il faut modifier le mot de passe de l'utilisateur
        if( isset($request['update_password']) && $request['update_password'] == 1) {
            $admin_fields_password = $request->validate(['password' => 'required|confirmed|min:6']);
            $admin_fields = array_merge($admin_fields, $admin_fields_password);
            $admin_fields['password'] = Hash::make($request->password);
        }
       
        $user->update($admin_fields);        
        return back()->with('success', 'Enregistrement modifié avec succès !');        

    }

    // Supprimer un administrateur
    public function destroy(User $user) {
        // Vérifier si c'est l'utilisateur actuel est un admin
        if(auth()->user()->role != 'admin') {
            abort(403, 'Non autorisé!');
        }

        $user->delete();
        return redirect('/admins')->with('success', 'Enregistrement supprimer avec succès !');
    }
}
