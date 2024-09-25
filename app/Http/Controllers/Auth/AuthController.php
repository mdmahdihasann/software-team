<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\FunctionContextPass;


class AuthController extends Controller
{
    public Function signIn(){
        if (Auth::check() && Auth::user()->role->slug == 'client') {
            return redirect('portal');
        }elseif(Auth::check() && Auth::user()->role->slug != 'client'){
            return redirect('app');
        }
        return view('frontend.auth.signIn');
    }
    public Function signUpShow(){
        return view('frontend.auth.registation');
    }
    public Function signUpStore(Request $request){
        $data=$request->except('_token','password','password_confirmation','phone');
        $data['password']= Hash::make($request->password);
        $data['phone_no']= $request->phone;
        $data['role_id']= 1;
        User::create($data);
        return back()->with('success','registation successfully');
    }
}
