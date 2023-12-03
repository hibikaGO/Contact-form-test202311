<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'tell1','tell2','tell3','email', 'address', 'building', 'content', 'detail']);
        return view('confirm', compact('contact'));
    }

    public function thanks(Request $request)
    {
        $contactData = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'content', 'detail','tell']);
        $genderMap = [
        '男性' => 1,
        '女性' => 2,
        'その他' => 3,
        ];
        $gender = $genderMap[$contactData['gender']];
        $contactData['gender'] = $gender;
        Contact::create($contactData);
        return view('thanks');
    }

    public function admin()
    {
        return view('admin');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }
    //
}
