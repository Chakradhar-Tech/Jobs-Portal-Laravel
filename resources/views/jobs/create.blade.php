<x-layout>

    <x-slot name="header">
        <h2>Create Job</h2>
     </x-slot>

    <x-form-field >

        <x-slot name="header">
            <p>Create a Job</p>
        </x-slot>
        <p class="alert alert-success fw-bold d-none" id="form-response"></p>
        <p id="title-error" class="alert alert-danger fw-bold d-none"></p>
        <p id="salary-error" class="alert alert-danger fw-bold d-none"></p>

    <form class="m-3" method="POST" id="create-form">

        @csrf

        <div class="form-group mb-3">

            <x-form-label for="title">Job Title</x-form-label>

            <x-form-input name="title" id="title" placeholder="CEO" />

        </div>

        <div class="form-group mb-3">

            <x-form-label for="salary">salary</x-form-label>

            <x-form-input name="salary" id="salary" placeholder="Salary" />

          </div>
          <a href="{{ url('/') }}" class="btn btn-outline-primary">Cancel</a>
          <x-form-button>Save</x-form-button>
        </form>
</x-form-field>
</x-layout>
