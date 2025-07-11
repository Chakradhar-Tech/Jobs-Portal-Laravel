<x-layout>

    <x-slot name="header">
        <h2>Log In</h2>
     </x-slot>

    <x-form-field class="mt-5">

        <x-slot name="header">
            <p>Login Form</p>
        </x-slot>
    <form class="m-3" method="POST" action="{{ url('/login') }}">

        @csrf

          <div class="form-group mb-3">

            <x-form-label for="email">Email</x-form-label>
            <x-form-input name="email" id="email" type="email" :value="old('email')" required/>
            <x-form-error name="email" />

          </div>


          <div class="form-group mb-3">
            <x-form-label for="password">Password</x-form-label>
            <x-form-input name="password" id="password" type="password" required/>
            <x-form-error name="password" />

          </div>

          <a href="{{ url('/') }}" class="btn btn-outline-primary">Cancel</a>
          <x-form-button>Login</x-form-button>
        </form>
</x-form-field>
</x-layout>
