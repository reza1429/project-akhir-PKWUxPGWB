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
            'username' => 'required',
            'no_induk' => 'required|unique:tb_user,no_induk|numeric',
            'email' => 'required|email|unique:tb_user,email',
            'kode_aktivasi' => 'required|in:sayainiadmintau',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        if ($request->kode_aktivasi == 'sayainiadmintau') {
            # code...
            $role = 0;
        } else {
            $role = nullValue();
        }
        $user = new User([
            'username' => $request->username,
            'no_induk' => $request->no_induk,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0
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
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors(['password' => 'email atau password salah!']);
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
        // dd(Auth::user()->role);
        if (Auth::user()->role == 0) {
            # code...
            return redirect()->intended('/dashboard')->with(['success' => 'password telah diubah!']);
        }elseif (Auth::user()->role == 1) {
            # code...
            return redirect()->intended('/home_siswa')->with(['success' => 'password telah diubah!']);
        }elseif (Auth::user()->role == 2) {
            # code...
            return redirect()->intended('/home_guru')->with(['success' => 'password telah diubah!']);
        }elseif (Auth::user()->role == 3) {
            # code...
            return redirect()->intended('/home_karyawan')->with(['success' => 'password telah diubah!']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('login');
    }
}
