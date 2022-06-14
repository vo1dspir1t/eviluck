<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Admin;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class AboutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = About::all();
        return view('pages/admin/about')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/admin/editable/about-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateFields = $request->validate([
            'initials' => 'required|min:5|max:100|string',
            'password' => 'min:6|max:255|confirmed|nullable',
            'profession' => 'required|min:5|max:45|string',
            'info' => 'string|nullable',
            'contact_email' => 'required|min:5|max:100|email',
            'phone' => 'required|min:10000000000|max:99999999999|numeric',
            'email' => 'required|min:5|max:100|unique:abouts|email',
            'linkDesc' => 'min:5|max:100|string|nullable',
            'link' => 'min:5|max:100|url|nullable',
        ]);
        About::create($validateFields);
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $user)
    {
        return view('pages/admin/editable/about-form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $user)
    {
        $validateFields = $request->validate([
            'avatarFile' => 'image|mimes:jpeg,jpg,png',
            'initials' => 'required|min:5|max:100|string',
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
            $file = 'images/avatars/'.$user->id.'_avatar.png';
            $path = $request->file('avatarFile')->storeAs('public', $file);
            $validateFields = Arr::prepend($validateFields, $file, 'avatar');
        }
        $user->update($validateFields);
        if ($request->get('access') == 0)
            $user->Admin()->delete();
        else
            if (!isset($user->Admin))
                $user->Admin()->create();
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = About::find($id);
        foreach ($user->Images as $image)
            Storage::delete('public/'.$image->portfolio_image);
        Storage::delete('public/'.$user->avatar);
        $user->Admin()->delete();
        $user->Images()->delete();
        $user->delete();
        return redirect('/admin/users');
    }
}
