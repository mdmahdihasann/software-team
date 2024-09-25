<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use DataTables;

class RolesController extends Controller
{
    public function index(){
        Gate::authorize('app.roles.index');
        $breadCrumb= ['Dashboard'=>route('app.dashboard'),'Roles'=>''];
        pagetitle('Roles');
        return view('backend.roles.index',['breadCrumb'=>$breadCrumb]);
    }

    public function getData(Request $request){
        if ($request->ajax()) {
            $getData=Role::with('permissions')->whereNotIn('slug',['client','super-admin'])->latest('id');

            return Datatables::eloquent($getData)
            ->addIndexColumn()
                ->addColumn('Opration', function($role){
                    $opration =
                     '<a href="javascript:void(0)" class="btn-style btn-style-edit"><i class="fa fa-edit"></i></a>
                     <button class="btn-style btn-style-danger"><i class="fa fa-trash"></i></button>
                     ';
                    return $opration;
                })
                ->addColumn('Permission', function($role){
                    return $role->permissions ? $role->permissions->count() : '0';
                })
                ->addColumn('created_at', function($role){
                    return date_times('d-m-Y',$role->created_at);
                })
                ->rawColumns(['Opration'])
                ->make(true);
        }
    }

    public function create(){
        //
    }
    public function store(){
        //
    }
    public function edit(){
        //
    }
    public function update(){
        //
    }
    public function destory(){
        //
    }
}
