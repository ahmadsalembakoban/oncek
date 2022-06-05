<?php


namespace App\Http\Controllers; 

use Auth;
use App\Models\User;
use Illuminate\Http\Request;



class AuthController extends Controller
{
    public function login() {
        return view('auths.login');
    }

    public function postlogin(Request $request) {

        // if(Auth::attempt($request->only('name', 'password'))) {
        //     return redirect('/dashboard');
            
        // }
	// return redirect('/login');
	// return 'hello';
    
        if(!Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->back();
        }

        return redirect('/dashboard');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    
}
