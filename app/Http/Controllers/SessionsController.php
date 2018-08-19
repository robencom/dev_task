<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest', ['except' => 'destroy']);

    }

    public function login()
    {

    	return view('sessions.login');

    } 


    public function store()
    {    

        $user = false;

        if (! auth()->attempt(request(['email', 'password']))) {

            return back()->withErrors(['message' => 'Kindly check your credentials and try again!']);

        } else {

            $user = \Auth::user();

        }
        
        if ($user->verified === 1) {

            return redirect('/home')->with('alert-info', 'Welcome!');

        } else {
            
            auth()->logout();

            return redirect('/login')->with('alert-danger', 'You have not activated your account yet. Kindly check your inbox for the activation email and click on the link.');

        }

    }

    public function destroy()
    {

    	auth()->logout();

        return redirect('/home');

    }
}
