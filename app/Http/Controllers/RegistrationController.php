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

    	$user = User::create($req);

        \Mail::to($user)->send(new ActivationMail($user));

    	return redirect('/home')->with('alert-success', 'You have registered successfully. You need to activate your account through the email we just sent you.');

    } 

    public function activateUser($code)
    {

        $alert = '';
        $message = '';
        
        try {

            $user = app(User::class)->where('activation_code', $code)->first();

            if (!$user) {

                $alert = 'alert-danger';
                
                $message = 'The code is not valid!';

                return redirect('/home')->with($alert, $message);

            }

            $user->verified = 1;

            $user->activation_code = null;

            $user->save();

            $alert = 'alert-success';

            $message = 'Your account has been activated!';

            auth()->login($user);

        } catch (\Exception $exception) {

            logger()->error($exception);

            $alert = 'alert-danger';

            $message = 'Whoops! something went wrong.';

        }

        return redirect('/home')->with($alert, $message);
    }


}
