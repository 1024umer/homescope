<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    //
    public function Login()
    {
        return view('auth.login');
    }

    public function ValidateLogin(Request $request)
    {
        $login = User::where(['email'=> $request->email , 'password' => sha1($request->password)])->first();
        // if($request->email == 'saddiq@quiksell.ae' && $request->password == 'just@dubai#123')
        if($login)
        {
            $session = session()->put([
                'id' =>1,
                'firstname' => 'admin',
                'email' =>'saddiq@quiksell.ae',

            ]);
            toastr()->success('Login Successfully');
            return redirect()->route('dashboard');
        }
        else{
            toastr()->error('Something went wrong!');
            return back();
        }
    }

    public function Register()
    {
        return view('auth.register');
    }

    public function ValidateRegister(Request $request)
    {
        $register = new User;
        $register->email = $request->email;
        $register->is_admin = 0;
        $register->password = sha1($request->password);
        if($register->save())
        {
            toastr()->success('Account Created Successfully!');
            return redirect()->route('login');
        }
        else{
            toastr()->error('Something went wrong!');
            return back();
        }
    }

    public function Logout()
    {
         Session::flush();
        return redirect()->route('login');
    }

    public function UserLogin()
    {
        return view('auth.user-login');
    }
    public function UserValidateLogin(Request $request)
    {
        $login = User::where(['email'=> $request->email , 'password' => sha1($request->password)])->first();
        if($login)
        {
            $session = session()->put([
                'id' => $login->id,
                'firstname' => $login->firstname,
                'lastname' => $login->lastname,
                'email' => $login->email,

            ]);
            toastr()->success('Login Successfully');
            return redirect()->route('user.index');
        }
        else{
            toastr()->error('Something went wrong!');
            return back();
        }
    }


    public function UserRegister()
    {
        return view('auth.user-register');
    }

    public function UserValidateRegister(Request $request)
    {
        $register = new User;
        $register->email = $request->email;
        $register->status = 1;
        $register->password = sha1($request->password);
        if($register->save())
        {
            toastr()->success('Account Created Successfully!');
            return redirect()->route('user.login');
        }
        else{
            toastr()->error('Something went wrong!');
            return back();
        }
    }
}
