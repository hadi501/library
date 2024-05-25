<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Passtoken;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);
 

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function changePass(Request $request){
        $password = $request->password;
        $token = $request->token;

        $email = Passtoken::where('token', $token)->first()->email;

        User::where('email', $email)->update(['password' => bcrypt($password)]);
        
        if(Auth::user()){
            return redirect()->action([AuthController::class, 'logout']);
        } else{
            return redirect()->to('/login');
        }
        
    
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
