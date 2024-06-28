<?php

namespace App\Http\Controllers;

use App\Mail\JobPoster;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Info;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class InfoController extends Controller
{
    public function index()
    {
        
        $job = Info::with('user.company')->latest('id')->cursorPaginate(5);
        return view('jobs.jobs', [
            'jobs' => ($job)
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Info $job)
    {
        $job = Info::with('comment.user')->find($job->id);
        return view('jobs.job', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        $user = Auth::user()->id;

        $job = Info::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'user_id' => $user
        ]);
        
        //Mail::to($job->user)->queue(new JobPoster($job));

        return redirect('/jobs');
    }

    public function edit(Info $job)
    {

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Info $job)
    {
        Gate::authorize('edit', $job);
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        // Same
        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Info $job)
    {
        Gate::authorize('edit', $job);
        $job->delete();
        return redirect('/jobs');
    }

    public function store_comment(Info $job)
    {

        $com = request()->validate([
            'content' => ['required'],
        ]);

        $user = Auth::user();
        $com['info_id'] = $job->id;
        $com['user_id'] = $user->id;

        Comment::create($com);

        return redirect('/jobs/'.$job->id);
    }
}