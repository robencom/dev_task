<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Mail\ForgotMail;

class PasswordsController extends Controller
{

    public function changePassword()
    {

    	if (Auth::check()) {

    		return view('passwords.change_password');

    	} else {

    		return redirect('/home');

    	}

    }    

    public function forgotPassword()
    {

    	if (Auth::guest()) {

    		return view('passwords.forgot_password');

    	} else {

    		return redirect('/home');

    	}

    }

    public function store(Request $request)
    {

        $user = Auth::user();

        $password = Auth::user()->password;

        $this->validate(request(), [
            
            'password' => 'required'

        ]);
    
        if (\Hash::check($request->password, $password)) {
            
            $user->password = bcrypt($request->new_password);

            $user->save();

        } else {

            return back()->withErrors(['message' => 'Provided old password is not correct!']);

        }

        return redirect('/home');

    }     

    public function sendResetEmail(Request $request)
    {

        $this->validate(request(), [
            
            'email' => 'required'

        ]);

        \Mail::to($request->email)->send(new ForgotMail($request->email));

        return back()->withErrors(['message' => 'An email has been sent to you with instructions to how to reset your password!']);

    } 

    public function resetPassword($email, $cryptedPassword)
    {
        
        $newPassword = \Crypt::decrypt($cryptedPassword);

        try {

            $user = app(User::class)->where('email', $email)->first();

            if (!$user) {

                return "There is no user with such email!";

            }

            $user->password = bcrypt($newPassword);

            $user->save();

            //also show reset success

            auth()->login($user);

        } catch (\Exception $exception) {

            logger()->error($exception);

            return "Whoops! something went wrong.";

        }

        return redirect('/change_password');
    }

}
