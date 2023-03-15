<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/css/form.css" />
    <link rel="stylesheet" type="text/css" href="/css/event.css" />
    <link rel="stylesheet" type="text/css" href="/css/section.css" />
    <link rel="stylesheet" type="text/css" href="/css/table.css" />
    <link rel="stylesheet" type="text/css" href="/css/ticket.css" />
    <link rel="stylesheet" type="text/css" href="/css/print.css" />
    <title>Events UI</title>
</head>
<body>
<div class="layout">
    <header class="layout__header">
        <div class="container">
            <div>
                <img src="/assets/logo1.png" alt="Tickets" />
            </div>

            <nav>
                <ul>
                    <x-categories-header />

                    @if ($cart = Session::get('cart'))
                        <li><a href="{{route('cart.show')}}"
                               total="{{array_reduce($cart, function($acc, $item) { return $acc + $item; } )}}"
                            >Krepšelis</a>
                        </li>
                    @endif

                    @guest
                        <li><a href="{{route('auth.login')}}">Prisijungti</a></li>
                    @endguest

                    @auth
                        <li>
                            <div class="user-menu">
                                <div class="user-menu__avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                    </svg>
                                </div>
                                <div class="user-menu__name" tabindex="0">
                                    {{Auth::user()?->title}}
                                </div>

                                <ul class="user-menu__nav">
                                    <li><a href="{{route('user.dashboard')}}">Dashboard</a></li>

                                    @if (Auth::user()?->isAdmin())
                                        <li><a href="{{route('admin.events.index')}}">Admin</a></li>
                                    @endif

                                    <li><a href="/logout">Atsijungti</a></li>
                                </ul>
                            </div>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>


    <div class="layout__content">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content', 'Default content')


    </div>

    <footer class="layout__footer">
        <div class="container">
            <div>
                <img src="/assets/logo1.png" alt="Tickets" />
                <p>Renginiai ir pramogos</p>
            </div>

            <div>
                <h4>Nuorodos</h4>
                <ul>
                    <li><a href="{{route('events.list')}}" style="color: white;">Naujausi renginiai</a></li>
                    <li>Kategorijos</li>
                    <li><a href="{{route('events.archive')}}" style="color: white;">Archyvas</a></li>
                    <li>Kontaktai</li>
                </ul>
            </div>

            <div>
                <h4>Naujienos</h4>
            </div>

            <div>
                <h4>Prenumeruoti naujienlaiškį</h4>
                <div class="input">
                    <input placeholder="Your email" />
                    <button>OK</button>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
