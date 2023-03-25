<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index($auth){
        if($auth === 'superadmin'){
            return view('auth.'.$auth);
        }elseif($auth === 'admin'){
            return view('auth.'.$auth);
        }elseif($auth === 'customer'){
            return view('auth.'.$auth);
        }else{
            return redirect('/');
        }
    }

    public function store(Request $request, $auth){
        $request -> validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = DB::table($auth)->where('username', '=', $request->email)->first();
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
      
    }
}
