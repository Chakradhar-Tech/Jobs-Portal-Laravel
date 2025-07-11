<x-layout>

    <x-slot name="header">
        <h2>
            Edit Job {{ $job['title'] }}
        </h2>
     </x-slot>

    <div class="container w-50 mt-5 mx-auto border border-light-50 rounded-4 shadow-lg bg-light p-4">
    <h5 class=" text-center fw-semibold">Edit Job</h5>

    <form class="m-3" method="POST" action="{{ url('jobs/'.$job->id) }}">

        @csrf
        @method('PATCH')

        <div class="form-group mb-3">
          <label for="title" class="mb-2 fw-semibold">Job Title:-</label>
          <input type="text"
          class="form-control"
          id="title"
          aria-describedby="emailHelp"
          name="title"
          placeholder="Enter title"
          value="{{ $job->title }}"
          required>

          @error('title')
          <p class="text-danger fw-semibold">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="salary" class="mb-2 fw-semibold">Salary:-</label>
          <input
          type="text"
          class="form-control"
          name="salary"
          id="salary"
          placeholder="Salary"
          value="{{ $job->salary }}"
          required>

          @error('salary')
          <p class="text-danger fw-semibold">{{ $message }}</p>
          @enderror
        </div>

        <div class="d-flex justify-content-between mt-4">

            <button form="delete_form" class="btn btn-outline-danger">Delete</button>

        <div>

        <a href="{{ url('jobs/'.$job->id) }}" class="btn btn-outline-primary">Cancel</a>
        <button type="submit" class="btn btn-outline-primary">Update</button>

        </div>
    </div>
      </form>

      <form method="POST" id="delete_form" action="{{ url('jobs/'.$job->id) }}">
        @csrf
        @method('DELETE')
    </form>
    
</div>
</x-layout>
