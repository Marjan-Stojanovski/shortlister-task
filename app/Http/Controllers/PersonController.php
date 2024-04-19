<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::paginate(10);
        return view('index', compact('persons'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255',
            'email' => 'required|email|unique:persons|max:255',
            'phone' => 'required|max:255',
            'date_of_birth' => 'required|date|before_or_equal:today',
        ], [
            'full_name' => 'Please, Enter your full name',
            'email.required' => 'Please, Enter e-mail!',
            'email.unique' => 'E-mail already exists!',
            'phone.required' => 'Please, Enter phone number!',
            'date_of_birth.required' => 'Please, Enter date of birth!',
            'date_of_birth.before_or_equal' => 'Please, Enter valid date of birth!',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $person = Person::create([
            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'date_of_birth' => $request->get('date_of_birth'),
        ]);
        if ($person) {
            Session::flash('flash_message', 'Person successfully added!');
            return redirect()->route('persons.index');
        } else {
            Session::flash('flash_message', 'Error happened, try again!');
            return redirect()->back();
        }
    }
}
