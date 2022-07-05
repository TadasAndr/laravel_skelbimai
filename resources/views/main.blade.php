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

</head>
<body>

{{-------------------------NAVBAR----------------------}}

<nav>
    <div class="navigation-content">
        <div class="action-logins">

            @if (Auth::check())
                <p style="display: inline;">Prisijungęs: <span
                        style="font-weight: bolder;">{{ Auth::user()->name }}</span></p>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                    <button class="action-logoff">Atsijungti</button>
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

{{------------------------------NAVBAR END----------------------------}}


{{--------------------------SEARCH BOX START----------------------}}
<form method="get" action="{{url('/search')}}">
    <div class="search-box">

        <div style="width: 100%" class="search-item">
            <input name="keyword" placeholder="Paieška" class="search-input" type="text">
        </div>
        <div class="search-item">
            <select name="category" class="search-select">
                <option value="0">Visos kategorijos</option>
                @foreach($categories as $category)

                    <option value="{{$category->id}}">{{$category->category_name}}</option>

                @endforeach
            </select>
        </div>

        <div class="search-item">
            <select name="city" class="search-select">
                <option value="0">Visi miestai</option>

                @foreach($cities as $city)

                    <option value="{{$city->id}}">{{$city->name}}</option>

                @endforeach
            </select>
        </div>

        <div class="search-item">
            <button class="add-ad-button" type="submit">Ieškoti</button>
        </div>

    </div>
</form>
{{--------------------------SEARCH BOX END-----------------}}


{{---------------------------MAIN CONTENT START----------------}}

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 category-box">
                <p class="category-head-text"><a href="{{route('display.category', ['category'=>1])}}">Transportas</a></p>
                <ul class="main-categories">
                    <li><a>Automobiliai</a>&nbsp;(24930)</li>
                    <li><a>Moto</a>&nbsp;(6445)</li>
                    <li><a>(Mikro)autobusai</a>&nbsp;(2051)</li>
                    <li><a>Dviračiai, paspirtukai</a>&nbsp;(19272)</li>
                    <li><a>Spec. transportas</a>&nbsp;(8327)
                    </li>
                    <li><a>Vandens transportas</a>&nbsp;(1283)</li>
                    <li><a>Žemės ūkio technika</a>&nbsp;(6260)</li>
                    <li><a>Dalys, aksesuarai</a>&nbsp;(225895)</li>
                    <li><a>Paslaugos</a>&nbsp;(4083)</li>
                    <li><a>Kita</a>&nbsp;(158)</li>
                </ul>
            </div>
            <div class="col-lg-3 category-box">
                <p class="category-head-text"><a href="{{route('display.category', ['category'=>2])}}">Nekilnojamas turtas</a></p>
                <ul class="main-categories">
                    <li><a>Butai</a>&nbsp;(6769)</li>
                    <li><a>Namai</a>&nbsp;(6438)</li>
                    <li><a>Patalpos</a>&nbsp;(1642)</li>
                    <li><a>Sklypai</a>&nbsp;(8932)</li>
                    <li><a>Sodybos</a>&nbsp;(1258)</li>
                    <li><a>Garažai</a>&nbsp;(551)</li>
                    <li><a>Nuoma</a>&nbsp;(6744)</li>
                    <li><a>Medžiagos, įranga</a>&nbsp;(25896)
                    </li>
                    <li><a>Statybos paslaugos</a>&nbsp;(3740)
                    </li>
                    <li><a>Kita</a>&nbsp;(368)</li>
                </ul>
            </div>
            <div class="col-lg-3 category-box">
                <p class="category-head-text"><a href="{{route('display.category', ['category'=>3])}}">Darbas, paslaugos</a></p>
                <ul class="main-categories">
                    <li><a>Siūlo darbą</a>&nbsp;(13132)</li>
                    <li><a>Ieško darbo</a>&nbsp;(1292)</li>
                    <li><a>Biuro paslaugos</a>&nbsp;(196)</li>
                    <li><a>Grožio, sveikatos
                            paslaugos</a>&nbsp;(347)
                    </li>
                    <li><a>Kursai, mokymai</a>&nbsp;(362)</li>
                    <li><a>Renginių paslaugos</a>&nbsp;(387)</li>
                    <li><a>Verslo paslaugos</a>&nbsp;(389)</li>
                    <li><a>Web sprendimai, svetainės</a>&nbsp;(57)
                    </li>
                    <li><a>Kita</a>&nbsp;(693)</li>
                </ul>
            </div>
            <div class="col-lg-3 category-box">
                <p class="category-head-text"><a href="{{route('display.category', ['category'=>4])}}">Buitis</a></p>
                <ul class="main-categories">
                    <li><a>Baldai, interjeras</a>&nbsp;(51512)</li>
                    <li><a>Flora, fauna</a>&nbsp;(14208)</li>
                    <li><a>Grožis, sveikata</a>&nbsp;(8098)</li>
                    <li><a>Kolekcionavimas</a>&nbsp;(63634)</li>
                    <li><a>Maistas, gėrimai</a>&nbsp;(1198)</li>
                    <li><a>Namų apyvokos reikmenys</a>&nbsp;(15591)
                    </li>
                    <li><a>Antikvariatas</a>&nbsp;(24003)</li>
                    <li><a>Dovanojama, radiniai</a>&nbsp;(1408)</li>
                    <li><a>Kietas, skystas kuras</a>&nbsp;(1095)</li>
                    <li><a>Kita</a>&nbsp;(925)</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 category-box">
                <p class="category-head-text"><a href="{{route('display.category', ['category'=>5])}}">Kompiuteriai</a></p>
                <ul class="main-categories">
                    <li><a>Kompiuteriai</a>&nbsp;(11597)</li>
                    <li><a>Išoriniai įrenginiai</a>&nbsp;(4817)
                    </li>
                    <li><a>Kompiuterių komponentai</a>&nbsp;(5775)
                    </li>
                    <li><a>Priedai, aksesuarai</a>&nbsp;(1686)</li>
                    <li><a>Programinė įranga, žaidimai</a>&nbsp;(2136)
                    </li>
                    <li><a>Tinklo įranga</a>&nbsp;(1431)</li>
                    <li><a>Paslaugos, remontas</a>&nbsp;(125)</li>
                    <li><a>Kita</a>&nbsp;(170)</li>
                </ul>
            </div>
            <div class="col-lg-3 category-box">
                <p class="category-head-text"><a href="{{route('display.category', ['category'=>6])}}">Komunikacijos</a></p>
                <ul class="main-categories">
                    <li><a>Mobilieji telefonai</a>&nbsp;(8238)</li>
                    <li><a>Radijo, GPS įranga</a>&nbsp;(1001)</li>
                    <li><a>Telefonai, faksai</a>&nbsp;(327)</li>
                    <li><a>Dalys, priedai</a>&nbsp;(4574)</li>
                    <li><a>Paslaugos, remontas</a>&nbsp;(71)</li>
                    <li><a>Kita</a>&nbsp;(359)</li>
                </ul>
            </div>
            <div class="col-lg-3 category-box">
                <p class="category-head-text"><a href="{{route('display.category', ['category'=>7])}}">Technika</a></p>
                <ul class="main-categories">
                    <li><a>Audio</a>&nbsp;(10480)</li>
                    <li><a>Video</a>&nbsp;(5424)</li>
                    <li><a>Buitinė technika</a>&nbsp;(16040)</li>
                    <li><a>Foto, optika</a>&nbsp;(5019)</li>
                    <li><a>Biuro, prekybinė technika</a>&nbsp;(719)</li>
                    <li><a>Sodui, daržui, miškui</a>&nbsp;(7491)</li>
                    <li><a>Pramoninė technika</a>&nbsp;(10505)</li>
                    <li><a> remontas</a>&nbsp;(482)</li>
                    <li><a>Kita</a>&nbsp;(2773)</li>
                </ul>
            </div>
            <div class="col-lg-3 category-box">
                <p class="category-head-text"><a href="{{route('display.category', ['category'=>8])}}">Darbas</a></p>
                <ul class="main-categories">
                    <li><a>Audio</a>&nbsp;(10480)</li>
                    <li><a>Video</a>&nbsp;(5424)</li>
                    <li><a>Buitinė technika</a>&nbsp;(16040)</li>
                    <li><a>Foto, optika</a>&nbsp;(5019)</li>
                    <li><a>Biuro, prekybinė technika</a>&nbsp;(719)</li>
                    <li><a>Sodui, daržui, miškui</a>&nbsp;(7491)</li>
                    <li><a>Pramoninė technika</a>&nbsp;(10505)</li>
                    <li><a>Paslaugos, remontas</a>&nbsp;(482)</li>
                    <li><a>Kita</a>&nbsp;(2773)</li>
                </ul>
            </div>
        </div>
    </div>

</main>

{{----------------------------MAIN CONTENT END--------------------------------}}

</body>
</html>
