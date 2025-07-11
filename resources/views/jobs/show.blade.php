<x-layout>

     <x-slot name="header">
        <h2>Job</h2>
     </x-slot>
   <h2 class=" container border rounded-3 bg-light px-3 text-center mt-3 p-1 shadow-sm"><b>{{$job->title}}</b></h2>
   <div class="text-center">

     <p >This job pays {{ $job->salary }} per year.</p>
    @can('edit', $job)

        <a href="{{ url('jobs/'.$job->id.'/edit') }}" class="btn btn-outline-dark">Edit Job</a>

    @endcan
    </div>
    </x-layout>
