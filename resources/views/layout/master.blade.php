<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'T3-2019130018') | T3-2019130018</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('css_after')
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-danger">
        <a class="navbar-brand" href="/">
            <i class="fa fa-film fa-fw" aria-hidden="true"></i>
            <span class="menu-collapsed">T3 - 2019130018</span>
        </a>
    </nav>
    <div class="row" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block ml-4">
            <ul class="list-group">
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <b>MAIN MENU</b>
                </li>
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <a class="text-danger" href="{{ route('books.index') }}">BOOKS</a>
                </li>
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <a class="text-danger" href="{{ route('authors.index') }}">AUTHORS</a>
                </li>
            </ul>
        </div>
        <div class="col p-4">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js_after')
</body>

</html>
