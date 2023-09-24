<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use phpDocumentor\Reflection\Utils;

use function Symfony\Component\String\b;

class UserController extends Controller
{
    public function loginView()
    {
        return view("auth.login");
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password'=> 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        $request->session()->flash('status', 'danger');
        $request->session()->flash('message', 'Silahkan cek kembali informasi login anda');
        return redirect()->back();
    }

    public function registerView()
    {
        return view("auth.register");
    }

    public function register(Request $request, User $user)
    {
        $validation = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'password' => 'required'
        ]);

        $data = $validation;
        $data['password'] = bcrypt($validation['password']);
        $data['role'] = 0;
        $user->create($data);

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Berhasil melakukan registrasi');
        return redirect()->route('user.login.view');
    }

    public function loginAdminView()
    {
        return view('auth.login_admin');
    }

    public function adminAuth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role != 1 ) {
                $request->session()->flash('status', 'danger');
                $request->session()->flash('message', 'Silahkan cek kembali informasi login anda');
                $request->session()->invalidate();
                return redirect()->back();
            }
            return redirect()->intended('/admin');
        }

        $request->session()->flash('status', 'danger');
        $request->session()->flash('message', 'Silahkan cek kembali informasi login anda');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->intended('/login');
    }

    public function logoutAdmin(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->intended('/admin/login');
    }

    public function resetPasswordView()
    {
        return view('auth.reset_password');
    }

    public function resetPassword(Request $request)
    {
        $validation = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        /* check username */
        $usernameExist = User::where('username', $validation['username'])->first();

        if ($usernameExist == null) {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Username tidak ditemukan !');
            return redirect()->route('user.reset.password.view');
        }

        $data = $validation;
        $data['id'] = $usernameExist->id;
        $data['password'] = bcrypt($validation['password']);
        $data['role'] = 0;
        User::where('id', $data['id'])->update($data);

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Berhasil reset password, silahkan login kembali');
        return redirect()->route('user.login.view');
    }
}
