<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Info;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        return view('auth.profile');
    }

    public function user() {
        $users = User::with('company')->cursorPaginate(5);
        return view('auth.user', [
            'users' => ($users)
        ]);
    }

    public function company() {
        $coms = Company::with('user')->cursorPaginate(5);
        return view('auth.company', [
            'coms' => ($coms)
        ]);
    }

    public function job() {
        $jobs = Info::with('user.company')->cursorPaginate(5);
        return view('auth.job', [
            'jobs' => ($jobs)
        ]);
    }
}
