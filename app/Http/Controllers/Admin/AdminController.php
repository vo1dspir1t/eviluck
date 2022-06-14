<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function login() {
        if (Auth::check())
            return redirect(route('admin'));
        return view('pages/admin/login');
    }

    public function logout() {
        Auth::logout();
        return redirect(route('login'));
    }

    public function register() {
        if (Auth::check())
            return redirect(route('admin'));
        return view('pages/admin/register');
    }

    public function admin() {
        return view('pages/admin/main');
    }

    public function account() {
        $user = Auth::user();
        return view('pages/admin/account', compact('user'));
    }

    public function accountSave(Request $request) {
        $user = About::find(Auth::id());
        $validateFields = $request->validate([
            'avatarFile' => 'image|mimes:jpeg,jpg,png',
            'initials' => 'required|min:5|max:100|string',
            'old_password' => 'min:6|max:255|nullable|current_password',
            'password' => 'min:6|max:255|confirmed|nullable',
            'profession' => 'required|min:5|max:45|string',
            'info' => 'string|nullable',
            'contact_email' => 'required|min:5|max:100|email',
            'phone' => 'required|min:10000000000|max:99999999999|numeric',
            'email' => 'required|min:5|max:100|email',
            'linkDesc' => 'min:5|max:100|string|nullable',
            'link' => 'min:5|max:100|url|nullable',
        ]);
        if($request->file('avatarFile')){
            $file = 'images/avatars/'.Auth::id().'_avatar.png';
            $path = $request->file('avatarFile')->storeAs('public', $file);
            $validateFields = Arr::prepend($validateFields, $file, 'avatar');
        }
        $user->update($validateFields);
        return redirect(route('admin'));
    }

    public function accountDelete()
    {
        $user = About::find(Auth::id());
        foreach ($user->Images as $image)
            Storage::delete('public/'.$image->portfolio_image);
        Storage::delete('public/'.$user->avatar);
        $user->Admin()->delete();
        $user->Images()->delete();
        $user->delete();
        return redirect(route('login'));
    }

}
