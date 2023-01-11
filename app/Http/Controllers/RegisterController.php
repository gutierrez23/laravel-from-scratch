<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'      => 'required|max:255',
            'email'     => 'required|email|unique:users,email|max:255',
            'username'  => 'required|unique:users,username|max:255|min:3',
            'password'  => 'required|max:255|min:7',
        ]);

        User::create($attributes);

        session()->flash('success', 'Your account has been created.');

        return redirect('/');
    }
}
