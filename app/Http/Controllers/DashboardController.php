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
        $widgets = $this->service_dash->getWIdgetsInfos();
        
        return view('dashboard', [
            'widgets' => $widgets
        ]);
    }

}
