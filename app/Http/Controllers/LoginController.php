<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        if (Auth::check())
            return redirect(route('admin'));
        $formFields = $request->only(['email', 'password']);
        if (Auth::attempt($formFields, $request->get('remember_me')))
            return redirect()->intended(route('login'));
        return redirect(route('login'))->withErrors([
            'error' => 'Провал! Аккаунт не существует/неверный пароль. Проверьте введенные данные.'
        ]);
    }
}
