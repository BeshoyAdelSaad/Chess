<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthUsers extends Controller
{
    //

  
 
    
    public function register_page()
    {
        return view('auth.register');
    } 

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required','confirmed', 'min:8', 'max:255']
        ]);

        $request['password'] = bcrypt($request['password']);

        User::create($request->post());

        return redirect()->route('home');
     
    }
/////////////////////////////////////////////////////////////////////////////
    public function login_page()
    {
        return view('auth.login');
    } 

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return back()->withErrors(['email'=> 'Invalid email or password'])->onlyInput('email');
        }


        return redirect()->route('home')->with('token',$token);
    }
///////////////////////////////////////////////////////////////////////////////////

}
