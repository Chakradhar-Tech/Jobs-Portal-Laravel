<x-layout>

    <x-slot name="header">
        <h2>Register</h2>
     </x-slot>

    <x-form-field >

        <x-slot name="header">
            <p>Register Form</p>
        </x-slot>
    <form class="m-3" method="POST" action="{{ url('/register') }}">

        @csrf

        <div class="form-group mb-3">

          <x-form-label for="first_name">First Name</x-form-label>

          <x-form-input name="first_name" id="first_name" required/>

         <x-form-error name="first_name" />

        </div>

        <div class="form-group mb-3">

            <x-form-label for="last_name">Last Name</x-form-label>
            <x-form-input name="last_name" id="last_name" required/>
           <x-form-error name="last_name" />

          </div>

          <div class="form-group mb-3">

            <x-form-label for="email">Email</x-form-label>
            <x-form-input name="email" id="email" type="email" required/>
           <x-form-error name="email" />

          </div>


          <div class="form-group mb-3">
            <x-form-label for="password">Password</x-form-label>
            <x-form-input name="password" id="password" type="password" required/>
           <x-form-error name="password" />

          </div>

          <div class="form-group mb-3">
            <x-form-label for="password_confirmation">Confrim Password</x-form-label>
            <x-form-input name="password_confirmation" id="password_confirmation" type="password" required/>
           <x-form-error name="password_confirmation" />

          </div>
          <a href="{{ url('/') }}" class="btn btn-outline-primary">Cancel</a>
          <x-form-button>Register</x-form-button>
        </form>
</x-form-field>
</x-layout>
