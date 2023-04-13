<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class UserService
{
    public function get_users_with_roles() {
        $users = DB::table('users')
        ->join('roles', 'users.role', '=', 'roles.code')
        ->select('users.*', 'roles.name AS role_name')
        ->where('users.id', '!=', auth()->user()->id)
        ->get();

        return $users;
    }
}

