<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats! your job is available on our website.
</p>

<p>
    <a href="{{ url('jobs/'.$job->id) }}">view your Job Listing</a>
</p>
