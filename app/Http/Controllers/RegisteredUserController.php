<?php

namespace App\Http\Controllers;

use App\Models\Company;
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

        $attributes['admin'] = false;

        $com = request()->validate([
            'name_com' => ['required'],
        ]);

        $company = Company::where('name_com', $com['name_com'])->first();

        if ($company) {
            $attributes['company_id'] = $company->id;
        } else {
            Company::create($com);
            $compa = Company::where('name_com', $com['name_com'])->first();
            $attributes['company_id'] = $compa->id;
        }

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/jobs');
    }
}
