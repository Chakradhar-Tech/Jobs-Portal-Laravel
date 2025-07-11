<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Finder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body>
<nav class="navbar navbar-expand-sm text-bg-light shadow-sm text-center pb-3 pt-3">
    <div class="container-fluid d-flex justify-content-between">
       <ul class="navbar-nav">
            <li class="nav-item d-flex  align-items-center mr-2">
                <x-navlink href="{{ url('/') }}" :active="request()->is('/')">JobFeind</x-navlink>
                {{-- @guest
                <span class="fw-semibold" style="font-size: 22px"> .com</span>
                @endguest --}}
            </li>
            <li class="nav-item">
                <x-navlink href="{{ url('/jobs') }}" :active="request()->is('jobs')">Jobs</x-navlink>
            </li>

            <li class="nav-item">
                <x-navlink href="{{ url('/contact') }}" :active="request()->is('contact')">Contact</x-navlink>
            </li>
            <li class="nav-item">
                <x-navlink href="{{ url('/jobs/create') }}" :active="request()->is('jobs/create')">Create Job</x-navlink>
            </li>
        </ul>
            <ul class="navbar-nav ">
                @guest
                <li class="nav-item">
                    <x-navlink href="{{ url('/login') }}" :active="request()->is('login')">Login</x-navlink>
                </li>

                <li class="nav-item">
                    <x-navlink href="{{ url('/register') }}" :active="request()->is('register')">Register</x-navlink>
                </li>
                @endguest
                @auth
                <form method="POST" action="{{ url('/logout') }}" class="d-flex align-items-center gap-4">

                    @csrf
                        <span class="fs-5">Welcome, <strong>{{ Auth::User()->first_name }} {{ Auth::User()->last_name }}</strong></span>
                       <button class="btn btn-danger">Log Out</button>
                </form>
                @endauth
             </ul>
    </div>
</nav>
    @if ( isset($header))
    <div class="d-flex justify-content-between align-items-center border-bottom m-2 p-2">{{ $header }}
   @auth
       <a href="{{ url('/jobs/create') }}" class="btn btn-outline-dark justify-content-between">Create Job</a>
   @endauth
    </div>
    @endif
   {{ $slot }}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
