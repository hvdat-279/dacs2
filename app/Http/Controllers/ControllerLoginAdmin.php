<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;


class ControllerLoginAdmin extends Controller
{
    function login()
    {
        return view('login.index');
    }

    function postLogin(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]
        );

        // dd($request->all());

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home')->with('success', 'Chào mừng bạn quay trở lại!');
        }

        return back()->with('error', "Đăng nhập thất bại!");
    }
    function logout()
    {
        Auth::logout();
        return redirect()->back()->with('success', 'Bạn đã đăng xuất!');
    }

    // Hiển thị form đăng ký
    public function showRegister()
    {
        return view('login.register');
    }

    // Xử lý đăng ký
    public function postRegister(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:50',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ]
        );

        $data['password'] = Hash::make($data['password']);

        try {
            User::create($data);
        } catch (\Throwable $th) {
            dd($th);
        }

        return redirect()->route('login')->with('success', 'Đăng ký thành công. Mời bạn đăng nhập!');
    }

    public function showForgotPassword()
    {
        return view('login.forgot-password');
    }

    // Gửi email đặt lại mật khẩu
    public function sendPasswordReset(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
            ]
        );

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', trans($status))
            : back()->withErrors(['email' => trans($status)]);
    }

    public function showResetPassword($token)
    {
        return view('login.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate(
            [
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
            ]
        );

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }


    //login admin
    public function loginAdmin()
    {
        return view('login.loginAdmin');
    }

    public function postLoginAdmin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])) {
            return redirect()->route('admin.home')->with('success', 'Chào mừng bạn quay trở lại!');
        } else {
            return redirect()->back()->with('err', 'Bạn không có quyền truy cập vào admin');
        }
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route("loginAdmin")->with('error', ' Thoát thành công!');
    }
}
