<h2>
    {{ $job->title }}
</h2>
<p>
    Congrats!
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View Your Job</a>
</p>
