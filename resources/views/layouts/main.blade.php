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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WEBLOG</a>
            <button class="navbar-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg 0">
                    <li class="nav-item">
                        <a href="{{ url('/')}}" aria-current="page" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/articles/new')}}" class="nav-link">New Article</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    @section('page-script')
        <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
    @show
    
</body>
</html>