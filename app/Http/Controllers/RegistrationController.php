<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\ActivationMail;

class RegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {

    	return view('registration.create');

    }     


    public function store(Request $request)
    {

    	$this->validate(request(), [

    		'username' => 'required|unique:users',

    		'email' => 'required|email|unique:users',
    		
    		'password' => 'required|confirmed'

    	]);

        $req = ['username' => $request->username, 
                'email'    => $request->email, 
                'password' => bcrypt($request->password),
                'activation_code' => str_random(30).time()
        ];

        //$user = User::create(request(['username', 'email', 'password']));
    	$user = User::create($req);

        \Mail::to($user)->send(new ActivationMail($user));

    	//auth()->login($user);

    	return redirect('/home');

    } 

    public function activateUser($code)
    {
        
        try {

            $user = app(User::class)->where('activation_code', $code)->first();

            if (!$user) {

                return "This code is not valid!!";

            }

            $user->verified = 1;

            $user->activation_code = null;

            $user->save();

            //also show activation was success

            auth()->login($user);

        } catch (\Exception $exception) {

            logger()->error($exception);

            return "Whoops! something went wrong.";

        }

        return redirect('/home');
    }


}
