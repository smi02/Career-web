<?php

namespace App\Http\Controllers;

use App\Mail\JobPoster;
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
        $job = Info::with('employer')->cursorPaginate(5);
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
        return view('jobs.job', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        $emp = Auth::user()->employer[0]->id;

        $job = Info::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => $emp
        ]);
        
        Mail::to($job->employer->user)->queue(new JobPoster($job));

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
}
