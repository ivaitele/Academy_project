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
    <title>Events UI</title>
</head>
<body>
<div class="layout">
    <header class="layout__header">
        <div class="container">
            <div>
                <img src="/assets/logo.png" alt="Tickets" />
            </div>

            <nav>
                <ul>
                    <li><a href="{{route('events.category', 'concerts')}}">Koncertai</a></li>
                    <li><a href="{{route('events.category', 'sportai')}}">Sportas</a></li>
                    <li><a href="{{route('events.category', 'teatrai')}}">Teatras</a></li>
                    <li><a href="{{route('events.list')}}">All Events</a></li>

                    @if ($cart = Session::get('cart'))
                        <li><a
                                href="{{route('cart.show')}}"
                                total="{{array_reduce($cart, function($acc, $item) { return $acc + $item; } )}}"
                            >
                                Cart
                            </a>
                        </li>
                    @endif

                    @guest
                    <li><a href="{{route('auth.login')}}">Log In</a></li>
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
                                    {{Auth::user()->name}}
                                </div>

                                <ul class="user-menu__nav">
                                    <li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
                                    <li><a href="/logout">Logout</a></li>
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
                <img src="/assets/logo.png" alt="Tickets" />
                <p>Aorem ipsum dolor sit amet elit sed lum tempor incididunt ut labore el dolore alg minim veniam quis nostrud ncididunt.</p>
            </div>

            <div>
                <h4>QUICK LINKS</h4>
                <ul>
                    <li>Home</li>
                    <li>Last event</li>
                    <li>Events</li>
                    <li>Categories</li>
                    <li>About Us</li>
                    <li>Contacts</li>
                </ul>
            </div>

            <div>
                <h4>RECENT POSTS</h4>
            </div>

            <div>
                <h4>SUBSCRIBE</h4>
                <div class="input">
                    <input placeholder="Your email" />
                    <button>OK</button>
                </div>

                <h4>FOLLOW US ON</h4>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
