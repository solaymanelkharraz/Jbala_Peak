<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jbala Peak | Collection</title>
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
            padding: 15px 5%;
            /* Adjusted for sticky look */
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background: var(--jbala-green);
            /* Solid background for sub-page */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .brand img {
            height: 50px;
            cursor: pointer;
        }

        nav ul {
            display: flex;
            gap: 40px;
            list-style: none;
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

        nav a:hover {
            color: var(--accent-gold);
        }

        /* PRODUCT GRID */
        .section {
            padding: 50px 8%;
            background: white;
            /* Margin top needed because header is fixed */
            margin-top: 100px;
            min-height: 80vh;
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

        footer {
            background: #0f291e;
            text-align: center;
            padding: 50px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 1rem;
            letter-spacing: 1px;
        }

        /* --- PAGINATION FIX --- */
        /* 1. Remove bullets and align horizontally */
        ul.pagination {
            display: flex !important;
            list-style: none !important;
            padding: 0;
            margin: 0;
            gap: 10px;
            justify-content: center;
        }

        /* 2. Style the buttons (Green & Gold) */
        .page-link {
            display: inline-block;
            padding: 10px 20px;
            border: 1px solid #143628;
            /* Jbala Green */
            color: #143628;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        /* 3. Hover Effect */
        .page-link:hover {
            background-color: #C69C6D;
            /* Gold Accent */
            color: white;
            border-color: #C69C6D;
        }

        /* 4. Active Page (The page you are on) */
        .page-item.active .page-link {
            background-color: #143628;
            color: white;
            border-color: #143628;
        }

        /* 5. Disabled Buttons (Previous when on page 1) */
        .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: #eee;
            border-color: #ddd;
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
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/about') }}">Our Story</a></li>
        <li><a href="{{ url('/products') }}">Collection</a></li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>

        <li>
            <a href="https://jbala-react-client.vercel.app" target="_blank"
               style="border: 1px solid var(--accent-gold); color: var(--accent-gold); padding: 5px 15px; border-radius: 20px;">
                API Client (React)
            </a>
        </li>

        @guest
            {{-- CASE A: NOT LOGGED IN (Show Login/Register) --}}
            <li>
                <a href="{{ route('login') }}" style="margin-left: 10px;">Login</a>
            </li>
            @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}" 
                       style="background-color: var(--accent-gold); color: white; padding: 8px 15px; border-radius: 20px; font-weight: bold;">
                       Register
                    </a>
                </li>
            @endif

        @else
            {{-- CASE B: LOGGED IN --}}
            
            {{-- Show Dashboard ONLY if ADMIN --}}
            @if(Auth::user()->role === 'ADMIN')
                <li>
                    <a href="{{ route('produits.index') }}"
                       style="background-color: var(--jbala-green); color: white; padding: 8px 20px; border-radius: 20px; font-weight: bold; border: 1px solid var(--accent-gold);">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
            @endif

            {{-- Logout Button (Shows User Name) --}}
            <li>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   style="color: var(--jbala-green); font-weight: bold; margin-left: 10px;">
                    <i class="fas fa-sign-out-alt"></i> Logout ({{ Auth::user()->name }})
                </a>
                
                {{-- Hidden Form Required for Security --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>
</nav>
    </header>

    <section id="products" class="section">
        <div class="section-header">
            <h2>Full Collection</h2>
            <div class="divider"></div>
            <p style="margin-top: 20px;">Curated items that bring the essence of the Rif into your life.</p>
        </div>

        <div class="cards-container">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image-box">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-details">
                        <a href="{{ route('shop.filter', $product->category) }}" class="category-tag">
                            {{ $product->category }}
                        </a>

                        <h3 class="product-title">{{ $product->name }}</h3>
                        <span class="product-price">{{ $product->price }} MAD</span>
                        <a href="#" class="btn-add-cart">Add to Cart</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 60px; display: flex; justify-content: center;">
            {{ $products->links('vendor.pagination.custom') }}
        </div>
    </section>

    <footer>
        <p>&copy; 2026 Jbala Peak. All Rights Reserved. Crafted by SoulaymanDev.</p>
    </footer>

</body>

</html>