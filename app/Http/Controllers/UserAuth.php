<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuth extends Controller
{
    //
    // public function index(){
    //     $data['title'] = 'Register';
    //     return view('login.register', $data);
    // }
    public function register(){
        $data['title'] = 'Register';
        return view('login.register', $data);
    }

    public function register_action(Request $request){
        $request->validate([
            'username' => 'required|unique:tb_user',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        $user = new User([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'registrasi berhasil, harap login!');
    }

    public function login(){
        $data['title'] = 'login';
        return view('login.login', $data);
    }
    
    public function login_action(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors(['password' => 'username atau password salah!']);
    }

    public function password(){
        $data['title'] = 'reset password';
        return view('login.password', $data);
    }

    public function password_action(Request $request){
        $request->validate([
            'old_password' => 'required|current_password',
            'password' => 'confirmed'
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return redirect()->intended('/')->with(['success' => 'password telah diubah!']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('login');
    }
}
