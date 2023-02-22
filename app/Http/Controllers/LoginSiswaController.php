<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\siswa;
use App\Models\guru;
use App\Models\karyawan;

class LoginSiswaController extends Controller
{
    //
    public function register_siswa(){
        $data['title'] = 'Register_lainnya';
        return view('login.register_siswa', $data);
    }

    public function register_siswa_action(Request $request){
        if (DB::table('siswa')->where('nisn', $request->no_induk)->exists()) {
            $role = 1;
            $this->validate($request, ['no_induk' => 'exists:siswa,nisn']);
        } elseif(DB::table('guru')->where('nip', $request->no_induk)->exists()){
            $role = 2;
            $this->validate($request, ['no_induk' => 'exists:guru,nip']);
        } elseif(DB::table('karyawan')->where('nip', $request->no_induk)->exists()){
            $role = 3;
            $this->validate($request, ['no_induk' => 'exists:karyawan,nip']);
        } else{
            $this->validate($request, ['no_induk' => 'exists:siswa,nisn']);
        }
        $request->validate([
            'no_induk' => 'required|unique:tb_user,no_induk|numeric',
            'email' => 'required|email|unique:tb_user,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        $user = new User([
            'username' => $request->username,
            'no_induk' => $request->no_induk,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role
        ]);
        // dd($user);
        $user->save();
        return redirect()->route('login_lainnya')->with('success', 'registrasi berhasil, harap login!');
    }

    public function login_siswa(){
        $data['title'] = 'login_lainnya';
        return view('login.login_siswa', $data);
    }
    
    public function login_siswa_action(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd(Auth::user()->role);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (Auth::user()->role == 1) {
                # code...
                return redirect()->intended('/home_siswa');
            } elseif (Auth::user()->role == 2) {
                # code...
                return redirect()->intended('/home_guru');
            } elseif (Auth::user()->role == 3) {
                # code...
                return redirect()->intended('/home_karyawan');
            }
        }
        return back()->withErrors(['password' => 'email atau password salah!']);
    }

    public function password_siswa(){
        $data['title'] = 'reset password siswa';
        return view('login.password_siswa', $data);
    }

    public function password_siswa_action(Request $request){
        $request->validate([
            'old_password' => 'required|current_password',
            'password' => 'confirmed'
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return redirect()->intended('/home_siswa')->with(['success' => 'password telah diubah!']);
    }

    public function logout_siswa(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('login');
    }
}
