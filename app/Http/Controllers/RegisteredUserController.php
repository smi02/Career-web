<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'              => ['required'],
            'email'             => ['required', 'email'],
            'password'          => ['required', Password::min(4), 'confirmed'],
        ]);

        $user = User::create($attributes);

        $emp = request()->validate([
            'name_emp' => ['required'],
        ]);
        $emp['user_id'] = $user->id;

        Auth::login($user);

        Employer::create($emp);
        
        return redirect('/jobs');
    }
}
