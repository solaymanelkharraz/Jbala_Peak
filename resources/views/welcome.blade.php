<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jbala Peak | Home</title>
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

        /* --- FIX: SLIMMER SCROLLED HEADER --- */
        header.scrolled {
            background: rgba(20, 54, 40, 0.95);
            backdrop-filter: blur(10px);
            padding: 8px 5%;
            /* Reduced padding significantly */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .brand img {
            height: 110px;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.2));
            transition: var(--transition);
            cursor: pointer;
        }

        /* --- FIX: SMALLER LOGO ON SCROLL --- */
        header.scrolled .brand img {
            height: 50px;
            /* Logo shrinks to fit slim header */
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
            background-image: url('art.jfif');
            animation-delay: 0s;
        }

        .slide:nth-child(2) {
            background-image: url('chefchaouen-tours.jpg');
            animation-delay: 6s;
        }

        .slide:nth-child(3) {
            background-image: url('honey.jfif');
            animation-delay: 12s;
        }

        .slide:nth-child(4) {
            background-image: url('pro.jpeg');
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

        /* --- MOVING CATEGORIES (MARQUEE) --- */
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

        .marquee-item i {
            margin-right: 10px;
            font-size: 0.8rem;
            vertical-align: middle;
        }

        @keyframes scrollText {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* PRODUCT CARDS (BIG GRID) */
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
            /* Responsive Grid */
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
            /* Tall, Big Images */
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

        /* FEATURED SPLIT SECTION */
        .featured-section {
            padding: 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: var(--bg-cream);
        }

        .featured-img {
            background-image: url('jbal.avif');
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

        /* TESTIMONIALS & NEWSLETTER */
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

        .newsletter {
            background-image: url('honey.jfif');
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
    </style>
</head>

<body>

    <header id="navbar">
        <div class="brand">
            <a href="{{ url('/') }}"><img src="logo.png" alt="Jbala Peak"></a>
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">Our Story</a></li>
                <li><a href="{{ url('/products') }}">Collection</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
    <li>
        <a href="{{ route('produits.index') }}" 
           style="background-color: var(--jbala-green); color: white; padding: 8px 20px; border-radius: 20px; font-weight: bold; border: 1px solid var(--accent-gold);">
           <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
    </li>
                
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
            <h1><span>Authentic</span> Northern Heritage</h1>
            <p>Handcrafted Clay Pottery, Traditional Djellabas, and Organic Mountain Honey. Direct from the Rif
                Mountains to your home.</p>
            <a href="about.html" class="btn-hero">Discover Our Roots</a>
        </div>
    </section>

    <div class="marquee-wrapper">
        <div class="marquee-content">
            <span class="marquee-item"><i class="fa-solid fa-mug-hot"></i> POTTERY</span>
            <span class="marquee-item"><i class="fa-solid fa-user-hooded"></i> DJELLABAS</span>
            <span class="marquee-item"><i class="fa-solid fa-jar"></i> ORGANIC HONEY</span>
            <span class="marquee-item"><i class="fa-solid fa-droplet"></i> OLIVE OIL</span>
            <span class="marquee-item"><i class="fa-solid fa-gem"></i> HANDMADE</span>
            <span class="marquee-item"><i class="fa-solid fa-leaf"></i> 100% NATURAL</span>
            <span class="marquee-item"><i class="fa-solid fa-mug-hot"></i> POTTERY</span>
            <span class="marquee-item"><i class="fa-solid fa-user-hooded"></i> DJELLABAS</span>
            <span class="marquee-item"><i class="fa-solid fa-jar"></i> ORGANIC HONEY</span>
            <span class="marquee-item"><i class="fa-solid fa-droplet"></i> OLIVE OIL</span>
            <span class="marquee-item"><i class="fa-solid fa-gem"></i> HANDMADE</span>
            <span class="marquee-item"><i class="fa-solid fa-leaf"></i> 100% NATURAL</span>
        </div>
    </div>

    <section id="products" class="section">
        <div class="section-header">
            <h2>Our Collection</h2>
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
    </section>

    <section class="featured-section">
        <div class="featured-img"></div>
        <div class="featured-content">
            <span class="tag">Editor's Pick</span>
            <h2>The Royal <br> Rif Djellaba</h2>
            <p>Experience the warmth and dignity of the traditional Northern wool Djellaba. Woven by hand in
                Chefchaouen, this garment is perfect for winter nights and cultural gatherings.</p>
            <a href="#" class="btn-dark">Shop This Look</a>
        </div>
    </section>

    <section class="testimonials">
        <div class="section-header">
            <h2>Community Stories</h2>
            <div class="divider"></div>
        </div>
        <div class="review-grid">
            <div class="review-card">
                <i class="fa-solid fa-quote-left"></i>
                <p class="review-text">"I ordered the Tagine set and it arrived safely in Paris. The quality is
                    unmatched, truly a piece of art."</p>
                <p class="review-author">- Sarah M.</p>
            </div>
            <div class="review-card">
                <i class="fa-solid fa-quote-left"></i>
                <p class="review-text">"The honey tastes exactly like what I remember from my childhood in the
                    mountains. Highly recommended!"</p>
                <p class="review-author">- Ahmed K.</p>
            </div>
            <div class="review-card">
                <i class="fa-solid fa-quote-left"></i>
                <p class="review-text">"Professional service and the Djellaba fits perfectly. Jbala Peak is the real
                    deal."</p>
                <p class="review-author">- John D.</p>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <div class="newsletter-content">
            <h2>Join The Tribe</h2>
            <p>Subscribe to get exclusive offers, new arrivals, and stories from the artisans.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email...">
                <button type="button" class="btn-gold">Join</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 Jbala Peak. All Rights Reserved. Crafted by SoulaymanDev.</p>
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