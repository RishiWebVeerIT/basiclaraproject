<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login(){
        $pageTitle = 'Login';
        return view('admin.login', compact('pageTitle'));
    }

    public function Register()
    {
        $pageTitle = 'Register';
        return view('admin.register', compact('pageTitle'));
    }

    public function save_register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'username' => 'required|unique:users,username',
            'name' => 'required',
        ]);

        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->username = $request->username;
        $user->designation = $request->designation;
        $user->name = $request->name;
        $user->role = 1;
        $user->save();

        if($request->login == '1')
        {
            if(Auth::attempt($request->only('email', 'password')))
            {
            return redirect('admin/console/')->with('success', 'You have successfully registered and logged in !');
            }

        }else{

            return redirect()->back()->with('success', 'You have successfully registered !');
            
        }
        
    }

    public function checkLogin(Request $request)
    {

         $request->validate([
            // 'email' => 'required|email|exists:users,email',
            'password' => 'required|same:password|min:6',
            // 'username' => 'required|exists:users,username',
        ]);

        $login = $request->input('email');
        $type = filter_var($login , FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credential = $request->merge([
            $type => $login,
            'password' => $request->password
        ]);

        if(Auth::attempt($request->only($type, 'password'), $request->remember))
        {
            $admin = Auth::user();

            if($admin->role == 1){
                return redirect('admin/console/')->with('success', 'You have logged in successfully');
            }else{
                Auth::logout();
                return redirect()->back()->with('error', 'Credentials didnt match with our data');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Credentials didnt match with our data');
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('admin/console/login')->with('success', 'You have logged out successfully');
      }
}
