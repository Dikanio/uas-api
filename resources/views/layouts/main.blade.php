<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weblog - @yield('title', 'Main')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light w-full">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WEBLOG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mb-2 mb-lg 0 d-flex justify-content-between ms-auto">
                    <li class="nav-item">
                        <a href="{{ url('/')}}" aria-current="page" class="nav-link">Home</a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('article-new')}}" class="nav-link">New Article</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        @if(Auth::check())
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hi, {{ Auth::user()->name }}
                            </a>
                        @else
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Akun
                            </a>
                        @endif
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><hr class="dropdown-divider"></li>
                            @if(Auth::check())
                                <a href="{{ route('logout')}}" class="dropdown-item">Logout</a>
                            @else
                                <a href="{{ route('login')}}" class="dropdown-item">Login</a>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
    <script type="text/javascript">
        @if(Session::has('success'))
            swal.fire(
                'Yeay',
                "{{ Session::get('success') }}",
                'success'
            )
        @endif
        @if(Session::has('failed'))
            swal.fire(
                'Oops',
                "{{ Session::get('failed') }}",
                'error'
            )
        @endif
    </script>
    @yield('page-script')
    
</body>
</html>