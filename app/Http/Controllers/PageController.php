<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Start() {
        return view('pages/start');
    }

    public function About() {
        $data = About::all();
        return view('pages/about')->withData($data);
    }

    public function Contacts() {
        $devs = About::all();
        $info = Contact::all();
        return view('pages/contacts')->withDevs($devs)->withInfo($info);
    }

    public function Pf() {
        $users = About::all();
        return view('pages/portfolio')->withUsers($users);
    }

}
