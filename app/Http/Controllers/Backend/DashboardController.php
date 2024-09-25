<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalUser=User::all()->count();
        Gate::authorize('app.Dashboard');
        $breadCrumb=['Dashboard'=>''];
        pagetitle('Dashboard');
        return view('backend.page.dashboard',['breadCrumb'=>$breadCrumb,'totalUser'=>$totalUser]);
    }
}
