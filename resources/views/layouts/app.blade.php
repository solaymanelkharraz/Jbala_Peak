<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jbala Peak') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* --- VARIABLES --- */
        :root {
            --bg-cream: #F9F7F2;
            --jbala-green: #143628;
            --accent-clay: #B07D62;
            --accent-gold: #C69C6D;
            --text-dark: #1A1A1A;
            --transition: all 0.4s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-cream);
            color: var(--text-dark);
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            line-height: 1.6;
        }

        h1, h2, h3 { font-family: 'Playfair Display', serif; }

        /* HEADER */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background: var(--jbala-green);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .brand a {
            font-family: 'Playfair Display', serif;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            display: block;
        }
        
        .brand img {
            height: 50px;
            cursor: pointer;
        }

        nav ul {
            display: flex;
            gap: 30px;
            list-style: none;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: color 0.3s;
        }

        nav a:hover { color: var(--accent-gold); }

        /* MAIN CONTENT FIX */
        main {
            padding: 50px 8%;
            margin-top: 100px;
            min-height: 80vh;
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <header id="navbar">
            <div class="brand">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('logo.png') }}" alt="Jbala Peak">
                </a>
            </div>
            
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/products') }}">Collection</a></li>

                    <li>
                        <a href="https://jbala-react-client.vercel.app" target="_blank" 
                           style="border: 1px solid var(--accent-gold); color: var(--accent-gold); padding: 5px 15px; border-radius: 20px;">
                            API Client
                        </a>
                    </li>

                    @guest
                        {{-- NOT LOGGED IN --}}
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}" style="margin-left: 10px;">Login</a></li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" 
                                   style="background-color: var(--accent-gold); padding: 8px 20px; border-radius: 20px; color: white;">
                                   Register
                                </a>
                            </li>
                        @endif
                    @else
                        {{-- LOGGED IN --}}
                        
                        {{-- 1. ADMIN BUTTON --}}
                        @if(Auth::user()->role === 'ADMIN')
                            <li>
                                <a href="{{ route('produits.index') }}" 
                                   style="background-color: white; color: var(--jbala-green); padding: 8px 20px; border-radius: 20px; font-weight: bold;">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                            </li>
                        
                        {{-- 2. CLIENT BUTTON (My Space) --}}
                        @else
                            <li>
                                <a href="{{ route('home') }}" 
                                   style="border: 1px solid #fff; color: #fff; padding: 8px 20px; border-radius: 20px; font-weight: bold;">
                                    <i class="fas fa-user-circle"></i> My Space
                                </a>
                            </li>
                        @endif

                        {{-- 3. LOGOUT BUTTON (Clean) --}}
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>