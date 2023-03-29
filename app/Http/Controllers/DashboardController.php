<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ServiceDash;

class DashboardController extends Controller
{

    protected $service_dash;
    public function __construct(ServiceDash $service_dash)
    {
        $this->service_dash = $service_dash;
    }

    public function all_users() {
        if(auth()->user()->role === 'student') {
            return redirect('/mycourses');
        }

        $widgets = $this->service_dash->getWIdgetsInfos();
      
        return view('dashboard', [
            'current_page' => 'dashboard',
            'page_title' => 'Tableau de bord',
            'widgets' => $widgets
        ]);
    }

}
