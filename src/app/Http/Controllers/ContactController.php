<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories =Category::all();
        return view('index',compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'tell1','tell2','tell3','email', 'address', 'building', 'category_id', 'detail']);
        $genderMap=[
        '1'=>'男性',
        '2'=>'女性',
        '3'=>'その他',
        ];
        $gender = $genderMap[$contact['gender']];
        $contactData['gender'] = $gender;
        $categoryId = $request->input('category_id');
        $categoryContent = Category::where('id', $categoryId)->value('content');

        return view('confirm', compact('contact','categoryContent','contactData'));
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
        $categories =Category::all();
        $contacts = Contact::with('category')->get();
        $contacts=Contact::paginate(3);
        $genderMap=[
        '1'=>'男性',
        '2'=>'女性',
        '3'=>'その他',
        ];
        $contacts->getCollection()->transform(function ($contact) use ($genderMap) {
        $contact->gender = $genderMap[$contact->gender] ?? '';
        return $contact;
    });

        return view('auth.admin',compact('contacts','categories'));
    }

    public function filter(Request $request)
    {
        $categories = Category::all();
        $nameOrEmail = $request->input('name_or_email');
        $gender = $request->input('gender');
        $content = $request->input('content');
        $day= $request->input('created_at');

        $contacts = Contact::query();

        if ($nameOrEmail) {
        $contacts->where(function ($query) use ($nameOrEmail) {
            $query->where('first_name', 'like', "%$nameOrEmail%")
                ->orWhere('last_name', 'like', "%$nameOrEmail%")
                ->orWhere('email', 'like', "%$nameOrEmail%");
        });
        }

        if ($gender && $gender !== '0') {
        $contacts->where('gender', $gender);
        }

        if ($content) {
        $contacts->where('category_id', $content);
        }

        if ($day) {
        $contacts->where('created_at', $day);
        }

        $searchResults = $contacts->paginate(3);
        $genderMap=[
        '1'=>'男性',
        '2'=>'女性',
        '3'=>'その他',
        ];
        $searchResults->getCollection()->transform(function ($contact) use ($genderMap) {
        $contact->gender = $genderMap[$contact->gender] ?? '';
        return $contact;
    });

        return view('auth.admin', [
        'categories' => $categories,
        'contacts' => $searchResults,
        'selectedGender' => $gender,
    ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }
    //
}
