<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Info;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('auth.profile', ['user' => $user]);
    }

    public function profile_edit(User $user)
    {
        $user_test = Auth::user();
        if ($user_test->id === $user->id) {
            return view('auth.edit', ['user' => $user]);
        } else {
            abort(403);
        }
    }

    public function profile_patch(User $user)
    {
        $user_test = Auth::user();
        if ($user_test->id === $user->id) {
            request()->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email'],
            ]);

            $user->update([
                'name' => request('name'),
                'email' => request('email'),
            ]);

            return redirect('/profile');
        } else {
            abort(403);
        }
    }

    public function profile_delete(User $user)
    {
        $user_test = Auth::user();
        if ($user_test->id === $user->id) {
            $user->delete();
            return redirect('/');
        } else {
            abort(403);
        }
    }

    public function user()
    {
        if (Auth::user()->admin) {
            $users = User::with('company')->cursorPaginate(5);
            return view('auth.user', [
                'users' => ($users)
            ]);
        } else {
            abort(403);
        }
    }

    public function destroy_user(User $user)
    {
        if (Auth::user()->admin) {
        $user->delete();
        return redirect('/dashboard/user');
    } else {
        abort(403);
    }
    }


    public function company()
    {
        if (Auth::user()->admin) {
        $coms = Company::with('user')->cursorPaginate(5);
        return view('auth.company', [
            'coms' => ($coms)
        ]);
    } else {
        abort(403);
    }
    }

    public function destroy_company(Company $company)
    {
        if (Auth::user()->admin) {
        $company->delete();
        return redirect('/dashboard/company');
    } else {
        abort(403);
    }
    }

    public function job()
    {
        if (Auth::user()->admin) {
        $jobs = Info::with('user.company')->cursorPaginate(5);
        return view('auth.job', [
            'jobs' => ($jobs)
        ]);
    } else {
        abort(403);
    }
    }
}
