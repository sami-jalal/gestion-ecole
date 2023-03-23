<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    Public function get_all() {
        $admins = User::all();
     
        return view('admins.index', [
            'current_page' => 'admins',
            'page_title' => 'Gestion des administrateur',
            "admins" => $admins
        ]);

    }
}
