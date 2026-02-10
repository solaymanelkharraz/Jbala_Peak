<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jbala Peak | {{ __('messages.home') }}</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet">
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

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg-cream);
            color: var(--text-dark);
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            line-height: 1.6;
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
        }

        /* HEADER */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 5%;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), transparent);
            transition: var(--transition);
        }

        header.scrolled {
            background: rgba(20, 54, 40, 0.95);
            backdrop-filter: blur(10px);
            padding: 8px 5%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .brand img {
            height: 110px;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.2));
            transition: var(--transition);
            cursor: pointer;
        }

        header.scrolled .brand img {
            height: 50px;
        }

        nav ul {
            display: flex;
            gap: 40px;
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
            position: relative;
            transition: color 0.3s;
        }

        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -5px;
            left: 50%;
            background-color: var(--accent-gold);
            transition: var(--transition);
            transform: translateX(-50%);
        }

        nav a:hover {
            color: var(--accent-gold);
        }

        nav a:hover::after {
            width: 100%;
        }

        /* HERO */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transform: scale(1.1);
            animation: cinematicZoom 24s infinite;
        }

        .slide:nth-child(1) {
            background-image: url('{{ asset('art.jfif') }}');
            animation-delay: 0s;
        }

        .slide:nth-child(2) {
            background-image: url('{{ asset('chefchaouen-tours.jpg') }}');
            animation-delay: 6s;
        }

        .slide:nth-child(3) {
            background-image: url('{{ asset('honey.jfif') }}');
            animation-delay: 12s;
        }

        .slide:nth-child(4) {
            background-image: url('{{ asset('pro.jpeg') }}');
            animation-delay: 18s;
        }

        @keyframes cinematicZoom {
            0% {
                opacity: 0;
                transform: scale(1.1);
            }

            10% {
                opacity: 1;
            }

            33% {
                opacity: 1;
                transform: scale(1);
            }

            43% {
                opacity: 0;
            }

            100% {
                opacity: 0;
            }
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2) 0%, rgba(20, 54, 40, 0.7) 100%);
            z-index: -1;
        }

        .hero-content {
            z-index: 2;
            width: 90%;
            max-width: 1400px;
            padding: 0 20px;
            opacity: 0;
            animation: fadeUp 1.2s cubic-bezier(0.2, 0.8, 0.2, 1) forwards 0.5s;
        }

        .hero h1 {
            font-size: 6.5rem;
            line-height: 1;
            color: #fff;
            margin-bottom: 25px;
            text-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            font-style: italic;
        }

        .hero h1 span {
            font-style: normal;
            display: block;
            font-size: 2.5rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 300;
            letter-spacing: 10px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: var(--accent-gold);
            text-shadow: none;
        }

        .hero p {
            font-size: 1.4rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 50px;
            font-weight: 300;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-hero {
            display: inline-block;
            padding: 20px 60px;
            background: transparent;
            color: #fff;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(5px);
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 1rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: #fff;
            transition: var(--transition);
            z-index: -1;
        }

        .btn-hero:hover {
            color: var(--jbala-green);
            border-color: #fff;
        }

        .btn-hero:hover::before {
            width: 100%;
        }

        /* MARQUEE */
        .marquee-wrapper {
            background-color: var(--jbala-green);
            padding: 20px 0;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            z-index: 5;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .marquee-content {
            display: inline-block;
            animation: scrollText 30s linear infinite;
        }

        .marquee-item {
            display: inline-block;
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 600;
            padding: 0 40px;
        }

        @keyframes scrollText {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* PRODUCTS */
        .section {
            padding: 100px 8%;
            background: white;
        }

        .section-header {
            margin-bottom: 60px;
            text-align: center;
        }

        .section-header h2 {
            font-size: 3.5rem;
            color: var(--jbala-green);
            margin-bottom: 15px;
        }

        .divider {
            height: 3px;
            width: 80px;
            background: var(--accent-gold);
            margin: 25px auto 0;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
        }

        .product-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
            border-color: var(--accent-gold);
        }

        .product-image-box {
            height: 350px;
            overflow: hidden;
            position: relative;
        }

        .product-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .product-card:hover .product-image-box img {
            transform: scale(1.1);
        }

        .product-details {
            padding: 30px;
            text-align: center;
        }

        .category-tag {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--accent-clay);
            margin-bottom: 10px;
            display: block;
            font-weight: 600;
            text-decoration: none;
        }

        .product-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--jbala-green);
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 1.2rem;
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 20px;
            display: block;
        }

        .btn-add-cart {
            display: inline-block;
            padding: 12px 35px;
            border: 1px solid var(--jbala-green);
            color: var(--jbala-green);
            text-decoration: none;
            border-radius: 50px;
            font-size: 0.85rem;
            text-transform: uppercase;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-add-cart:hover {
            background: var(--jbala-green);
            color: white;
        }

        /* FEATURED */
        .featured-section {
            padding: 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: var(--bg-cream);
        }

        .featured-img {
            background-image: url('{{ asset('jbal.avif') }}');
            background-size: cover;
            background-position: center;
            min-height: 600px;
        }

        .featured-content {
            padding: 100px 8%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .tag {
            color: var(--accent-gold);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .featured-content h2 {
            font-size: 3.5rem;
            color: var(--jbala-green);
            line-height: 1.1;
            margin-bottom: 25px;
        }

        .featured-content p {
            color: #555;
            font-size: 1.1rem;
            margin-bottom: 35px;
        }

        .btn-dark {
            background: var(--jbala-green);
            color: white;
            padding: 18px 45px;
            text-decoration: none;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-dark:hover {
            background: var(--accent-gold);
        }

        /* TESTIMONIALS */
        .testimonials {
            background: white;
            padding: 100px 8%;
            text-align: center;
        }

        .review-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .review-card {
            background: var(--bg-cream);
            padding: 40px;
            border-radius: 12px;
            text-align: left;
        }

        .review-card i {
            color: var(--accent-gold);
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .review-text {
            font-size: 1.1rem;
            font-style: italic;
            color: #555;
            margin-bottom: 20px;
        }

        .review-author {
            font-weight: 600;
            color: var(--jbala-green);
            font-family: 'Playfair Display', serif;
        }

        /* NEWSLETTER */
        .newsletter {
            background-image: url('{{ asset('honey.jfif') }}');
            background-size: cover;
            background-position: center;
            padding: 100px 8%;
            text-align: center;
            position: relative;
            color: white;
        }

        .newsletter::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(20, 54, 40, 0.85);
        }

        .newsletter-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter h2 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 30px;
        }

        .newsletter-form input {
            padding: 18px;
            border-radius: 50px;
            border: none;
            width: 60%;
        }

        .btn-gold {
            background: var(--accent-gold);
            color: white;
            border: none;
            padding: 18px 30px;
            border-radius: 50px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            transition: var(--transition);
        }

        .btn-gold:hover {
            background: white;
            color: var(--jbala-green);
        }

        footer {
            background: #0f291e;
            text-align: center;
            padding: 50px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 1rem;
            letter-spacing: 1px;
        }

        /* Dropdown Container */
        .dropdown-container:hover .dropdown-content {
            display: block;
        }

        /* Dropdown Menu [cite: 5-6] */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: var(--jbala-green);
            min-width: 140px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1001;
            border-radius: 10px;
            top: 35px;
            right: 0;
        }

        /* Dropdown Links [cite: 18-21] */
        .dropdown-content a {
            color: white !important;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-transform: capitalize !important;
            font-size: 0.85rem !important;
            letter-spacing: 1px;
        }

        .dropdown-content a:hover {
            background-color: var(--accent-gold);
            border-radius: 10px;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* LANG SWITCHER */
        .lang-switch {
            display: flex;
            gap: 10px;
        }

        .lang-switch a {
            padding: 5px 10px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 5px;
            font-size: 0.7rem !important;
        }
    </style>
</head>

<body>
    <header id="navbar">
        <div class="brand">
            <a href="{{ url('/') }}"><img src="{{ asset('logo.png') }}" alt="Jbala Peak"></a>
        </div>
        <nav>
            <ul>
                <li><a href="{{ url(app()->getLocale() . '/about') }}">{{ __('messages.our_story') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/products') }}">{{ __('messages.collection') }}</a></li>
                <li><a href="{{ url(app()->getLocale() . '/contact') }}">{{ __('messages.contact') }}</a></li>

                <li>
                    <a href="{{ route('cart', ['lang' => app()->getLocale()]) }}" style="position: relative;">
                        <i class="fa-solid fa-cart-shopping"></i> {{ __('messages.panier') }}
                        @if(session('cart') && count(session('cart')) > 0)
                            <span
                                style="background: var(--accent-gold); color: white; border-radius: 50%; padding: 2px 7px; font-size: 10px; position: absolute; top: -10px; right: -15px;">
                                {{ count(session('cart')) }}
                            </span>
                        @endif
                    </a>
                </li>

                <li class="dropdown-container" style="position: relative;">
                    <a href="javascript:void(0)"
                        style="border: 1px solid rgba(255,255,255,0.3); padding: 5px 15px; border-radius: 20px;">
                        <i class="fa-solid fa-globe"></i> {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-content">
                        <a href="{{ url('/en') }}">English</a>
                        <a href="{{ url('/fr') }}">Français</a>
                        <a href="{{ url('/ar') }}">العربية</a>
                    </div>
                </li>

                <li>
                    <a href="https://jbala-react-client.vercel.app" target="_blank"
                        style="border: 1px solid var(--accent-gold); color: var(--accent-gold); padding: 5px 15px; border-radius: 20px;">
                        API Client
                    </a>
                </li>

                @guest
                    @if (Route::has('login'))
                        <li><a href="{{ route('login') }}" style="margin-left: 10px;">{{ __('messages.login') }}</a></li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}"
                                style="background-color: var(--accent-gold); color: white; padding: 8px 15px; border-radius: 20px; font-weight: bold;">
                                {{ __('messages.register') }}
                            </a>
                        </li>
                    @endif
                @else
                    @if(Auth::user()->role === 'ADMIN')
                        <li>
                            <a href="{{ route('produits.index') }}"
                                style="background-color: white; color: var(--jbala-green); padding: 8px 20px; border-radius: 20px; font-weight: bold;">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('messages.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-bg">
            <div class="slide"></div>
            <div class="slide"></div>
            <div class="slide"></div>
            <div class="slide"></div>
        </div>
        <div class="overlay"></div>
        <div class="hero-content">
            <h1><span>{{ __('messages.hero_span') }}</span> {{ __('messages.hero_h1') }}</h1>
            <p>{{ __('messages.hero_p') }}</p>
            <a href="{{ url('/about') }}" class="btn-hero">{{ __('messages.btn_hero') }}</a>
        </div>
    </section>

    <div class="marquee-wrapper">
        <div class="marquee-content">
            <span class="marquee-item"><i class="fa-solid fa-mug-hot"></i> {{ __('messages.pottery') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-user-hooded"></i> {{ __('messages.djellabas') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-jar"></i> {{ __('messages.organic_honey') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-droplet"></i> {{ __('messages.olive_oil') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-gem"></i> {{ __('messages.handmade') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-leaf"></i> {{ __('messages.natural') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-mug-hot"></i> {{ __('messages.pottery') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-user-hooded"></i> {{ __('messages.djellabas') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-jar"></i> {{ __('messages.organic_honey') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-droplet"></i> {{ __('messages.olive_oil') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-gem"></i> {{ __('messages.handmade') }}</span>
            <span class="marquee-item"><i class="fa-solid fa-leaf"></i> {{ __('messages.natural') }}</span>
        </div>
    </div>

    <section id="products" class="section">
        <div class="section-header">
            <h2>{{ __('messages.our_collection') }}</h2>
            <div class="divider"></div>
            <p style="margin-top: 20px;">{{ __('messages.collection_p') }}</p>
        </div>

        <div class="cards-container">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image-box">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-details">
                        <a href="{{ route('shop.filter', ['lang' => app()->getLocale(), 'cat' => $product->category]) }}"
                            class="category-tag">{{ $product->category }}</a>
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <span class="product-price">{{ $product->price }} MAD</span>
                        <a href="{{ route('add.to.cart', ['lang' => app()->getLocale(), 'id' => $product->id]) }} "
                            class="btn-add-cart">
                            <i class="fa fa-shopping-cart"></i> {{ __('messages.add_to_cart') }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="featured-section">
        <div class="featured-img"></div>
        <div class="featured-content">
            <span class="tag">{{ __('messages.tag') }}</span>
            <h2>{{ __('messages.featured_h2') }}</h2>
            <p>{{ __('messages.featured_p') }}</p>
            <a href="#" class="btn-dark">{{ __('messages.btn_dark') }}</a>
        </div>
    </section>

    <section class="testimonials">
        <div class="section-header">
            <h2>{{ __('messages.community_stories') }}</h2>
            <div class="divider"></div>
        </div>
        <div class="review-grid">
            <div class="review-card">
                <i class="fa-solid fa-quote-left"></i>
                <p class="review-text">{{ __('messages.review_1') }}</p>
                <p class="review-author">- Sarah M.</p>
            </div>
            <div class="review-card">
                <i class="fa-solid fa-quote-left"></i>
                <p class="review-text">{{ __('messages.review_2') }}</p>
                <p class="review-author">- Ahmed K.</p>
            </div>
            <div class="review-card">
                <i class="fa-solid fa-quote-left"></i>
                <p class="review-text">{{ __('messages.review_3') }}</p>
                <p class="review-author">- John D.</p>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <div class="newsletter-content">
            <h2>{{ __('messages.join_tribe') }}</h2>
            <p>{{ __('messages.subscribe_p') }}</p>
            <form class="newsletter-form">
                <input type="email" placeholder="{{ __('messages.email_placeholder') }}">
                <button type="button" class="btn-gold">{{ __('messages.btn_gold') }}</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 Jbala Peak. {{ __('messages.footer_rights') }}</p>
    </footer>

    <script>
        window.addEventListener('scroll', function () {
            const header = document.getElementById('navbar');
            if (window.scrollY > 50) { header.classList.add('scrolled'); }
            else { header.classList.remove('scrolled'); }
        });
    </script>
</body>

</html>