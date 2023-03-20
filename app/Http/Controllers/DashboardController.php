<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function all_users() {
        $admins = User::all()->where('role', '=', 'admin')->count();
        dd($admins);

        
        return view('dashboard', [
            'admins' => $admins
        ]);
    }

}
