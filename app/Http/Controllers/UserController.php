<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Récupérer le liste des useristrateurs
    Public function get_all() {
        // joindre les tabes users et roles
        $users = DB::table('users')
            ->join('roles', 'users.role', '=', 'roles.code')
            ->select('users.*', 'roles.name AS role_name')
            ->where('users.id', '!=', auth()->user()->id)
            ->get();
            
        return view('users.index', [
            'current_page' => 'users',
            'page_title' => 'Gestion des utilisateur',
            "users" => $users
        ]);
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        $roles = Role::all();

        return view('users.create', [
            'roles' => $roles,
            'current_page' => 'users',
            'page_title' => 'Ajouter un utilisateur'
        ]);
    }

    // Ajouter un nouveau user
    public function store(Request $request) {
         // Vérifier si c'est l'utilisateur actuel est un user
         if(auth()->user()->role != 'admin') {
            abort(403, 'Non autorisé!');
        }

        $user_fields = $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'adress' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'birth_date' => 'nullable|date',
            'cin' => 'nullable',
            'phone' => 'nullable',
            'role' => 'nullable'
        ]);
        $user_fields['password'] = Hash::make($request->password);

        User::create($user_fields);
        
        return redirect('/users')->with('success', 'Enregistrement ajouté avec succès !');        
    }

    // Afficher le formaulaire me modification
    public function edit(User $user) {
        return view('users.edit', [
            'user' => $user,
            'current_page' => 'users',
            'page_title' => 'Modifier un utilisateur'
        ]);
    }

    // Mettre à jour les informations d'un useristrateur
    public function update(Request $request, User $user) {
        // Vérifier si c'est l'utilisateur actuel est un user
        if(auth()->user()->role != 'user') {
            abort(403, 'Non autorisé!');
        }

        $user_fields = $request->validate([
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
            $user_fields_password = $request->validate(['password' => 'required|confirmed|min:6']);
            $user_fields = array_merge($user_fields, $user_fields_password);
            $user_fields['password'] = Hash::make($request->password);
        }
       
        $user->update($user_fields);        
        return back()->with('success', 'Enregistrement modifié avec succès !');        

    }

    // Supprimer un utilisateur
    public function destroy(User $user) {
        // Vérifier si c'est l'utilisateur actuel est un user
        if(auth()->user()->role != 'user') {
            abort(403, 'Non autorisé!');
        }

        $user->delete();
        return redirect('/users')->with('success', 'Enregistrement supprimer avec succès !');
    }
}
