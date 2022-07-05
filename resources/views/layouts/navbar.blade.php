<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skelbimai.lt : in-development</title>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
            integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/result_page.css') }}">
</head>
<body>

<nav>
    <div class="navigation-content">
        <div class="action-logins">

            @if (Auth::check())
                <p style="display: inline;">Prisijungęs: <span
                        style="font-weight: bolder;">{{ Auth::user()->name }}</span></p>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                    <button class="action-logoff">{{ __('Logout') }}</button>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <a href="/login">
                    <button class="action-login">Prisijungti</button>
                </a>
            @endif

        </div>
        <div class="nav-block">
            <h1><a style="text-decoration: none; color: inherit;" href="/">Skelbimai.lt</a></h1>
        </div>
        <div class="vl"></div>
        <div class="nav-block">
            <a href="

               @if(Auth::check())
                /skelbimai/create
@else
                /login
@endif
                ">
                <button class="add-ad-button">+Įdėti skelbimą</button>
            </a>
        </div>

        @if(Auth::check())
            <div class="vl"></div>
            <div class="nav-block">
                <a href="{{url('/mano-skelbimai')}}">
                    <button class="add-ad-button">Mano skelbimai</button>
                </a>
                @endif
            </div>
            @if(Auth::check())
                @if(Auth::user()->is_admin)
                    <div class="vl"></div>
                    <div class="nav-block">

                        <a href="{{url('/admin')}}">
                            <button class="add-ad-button">Admin</button>
                        </a>

                    </div>

                @endif
            @endif
    </div>
</nav>

<main>

    @yield('content')

</main>

</body>

</html>
