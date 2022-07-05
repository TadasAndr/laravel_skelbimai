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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/create_ad_page.css') }}">
</head>
<body>
<nav>
    <div class="navigation-content">
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
        <div class="action-logins">

            @if (Auth::check())
                <p style="display: inline;">Prisijungęs: <span
                        style="font-weight: bolder;">{{ Auth::user()->name }}</span></p>
                <a class="dropdown-item" href="{{ route('logout') }}"
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
    </div>
</nav>

<div class="ad-creation-form-box">

    <form method="post" action="/skelbimai" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-item">
            <p>Antraštė</p>
            <input name="ad_header" type="text"/>
        </div>

        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>

        <div class="form-item">
            <p>Kategorija</p>
            <select name="category_id">
                <option value="0">Pasirinkti</option>
                @foreach($categories as $category)

                    <option value="{{$category->id}}">{{$category->category_name}}</option>

                @endforeach
            </select>
        </div>

        <div class="form-item">
            <p>Skelbimo aprašymas</p>
            <textarea name="description"></textarea>
        </div>

        <div class="form-item">
            <p>Veiksmas</p>
            <select name="action">
                <option>Parduoda</option>
                <option>Ieško</option>
            </select>
        </div>

        <div class="form-item">
            <p>Kaina</p>
            <input name="price" type="number"/>
        </div>

        <div class="form-item">
            <p>Nuotraukos</p>
            <input type="file" name="picture"/>
        </div>

        <div class="form-item">
            <p>Stovis</p>
            <select name="condition">
                <option>Naujas</option>
                <option>Devėtas</option>
            </select>
        </div>

        <div class="form-item">
            <p>Telefono nr.</p>
            <input name="phone_number" type="text"/>
        </div>

        <div class="form-item">
            <p>El.Pašto adresas</p>
            <input name="email" type="text"/>
        </div>

        <div class="form-item">
            <p>Miestas</p>
            <select name="city_id">

                <option value="0">Pasirinkite miestą</option>
                @foreach($cities as $city)

                    <option value="{{$city->id}}">{{$city->name}}</option>

                @endforeach


            </select>
        </div>

        <div class="form-item">
            <p>Internetinis puslapis</p>
            <input name="website" type="text"/>
        </div>

        <div class="form-item">
            <p>Nuoroda į video</p>
            <input name="video" type="text"/>
        </div>

        <div class="form-item">
            <button type="submit" class="add-ad-button">Patalpinti</button>
        </div>
    </form>

</div>

</body>
