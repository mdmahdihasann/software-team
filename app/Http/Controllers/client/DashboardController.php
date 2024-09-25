<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function dashboard(){
        Gate::authorize('app.Dashboard');
        $breadCrumb=['Dashboard'=>''];
        pagetitle('Dashboard');
        return view('backend.page.dashboard',['breadCrumb'=>$breadCrumb]);
    }
}
