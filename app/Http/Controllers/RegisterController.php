<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request) {
        if (Auth::check())
            return redirect(route('admin'));
        $validateFields = $request->validate([
            'initials' => 'required|min:5|max:100|string',
            'profession' => 'required|min:5|max:45|string',
            'contact_email' => 'required|min:5|max:100|email',
            'phone' => 'required|min:10000000000|max:99999999999|numeric',
            'email' => 'required|min:5|max:100|unique:abouts|email',
            'password' => 'required|min:6|max:255|confirmed',
        ]);
        $user = About::create($validateFields);
        if ($user) {
            Auth::login($user);
            if (Admin::all()->count() < 1)
                About::find(Auth::id())->Admin()->save(new Admin(['uid' => Auth::id()]));
            return redirect(route('admin'));
        }
        return redirect(route('register'))->withErrors([
            'error' => 'Ошибка записи. Проверьте введенные данные.'
        ]);
    }
}
