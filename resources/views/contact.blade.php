<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jbala Peak | Contact Us</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- COPY CSS FROM INDEX.HTML VARIABLES --- */
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
            line-height: 1.6;
        }

        h1,
        h2 {
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

        /* PAGE BANNER */
        .page-header {
            height: 60vh;
            /* Ensure you have this image or change the path */
            background-image: url('{{ asset("img/chefchaouen-tours.jpg") }}'); 
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .page-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .page-header h1 {
            position: relative;
            z-index: 2;
            color: white;
            font-size: 5rem;
            font-style: italic;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        /* CONTACT SECTION */
        .contact-section {
            padding: 120px 8%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
        }

        .contact-text h2 {
            font-size: 3.5rem;
            color: var(--jbala-green);
            margin-bottom: 20px;
        }

        .contact-text p {
            opacity: 0.7;
            font-weight: 300;
            margin-bottom: 40px;
            font-size: 1.2rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
            padding: 25px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }

        .contact-item:hover {
            transform: translateX(10px);
            border-left: 5px solid var(--accent-gold);
        }

        .contact-item i {
            color: var(--accent-gold);
            font-size: 1.4rem;
        }

        .form-box {
            background: white;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        }

        .form-box input,
        .form-box textarea {
            width: 100%;
            padding: 20px;
            background: var(--bg-cream);
            border: 1px solid #ddd;
            color: var(--text-dark);
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 20px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-box input:focus,
        .form-box textarea:focus {
            outline: none;
            border-color: var(--accent-gold);
            background: white;
        }

        .btn-submit {
            width: 100%;
            padding: 20px;
            background: var(--accent-gold);
            color: #fff;
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-submit:hover {
            background: var(--accent-clay);
        }

        footer {
            background: #0f291e;
            text-align: center;
            padding: 50px;
            color: rgba(255, 255, 255, 0.4);
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
            <a href="{{ route('cart') }}" style="position: relative;">
                <i class="fa-solid fa-cart-shopping"></i> Panier
                @if(session('cart') && count(session('cart')) > 0)
                    <span style="background: var(--accent-gold); color: white; border-radius: 50%; padding: 2px 7px; font-size: 10px; position: absolute; top: -10px; right: -15px;">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>
        </li>

        <li>
            <a href="https://jbala-react-client.vercel.app" target="_blank"
                style="border: 1px solid var(--accent-gold); color: var(--accent-gold); padding: 5px 15px; border-radius: 20px;">
                API Client
            </a>
        </li>

        @guest
            @if (Route::has('login'))
                <li><a href="{{ route('login') }}" style="margin-left: 10px;">Login</a></li>
            @endif

            @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}"
                        style="background-color: var(--accent-gold); color: white; padding: 8px 15px; border-radius: 20px; font-weight: bold;">
                        Register
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
            @else
                <li>
                    <a href="{{ route('home') }}"
                        style="border: 1px solid #fff; color: #fff; padding: 8px 20px; border-radius: 20px; font-weight: bold;">
                        <i class="fas fa-user-circle"></i> My Space
                    </a>
                </li>
            @endif

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

    <div class="page-header">
        <h1>Get in Touch</h1>
    </div>

    <section class="contact-section">
        <div class="contact-text">
            <h2>We'd Love to Hear From You</h2>
            <p>Whether you have a question about our pottery, want to order custom Djellabas, or are interested in bulk
                honey orders, we are here to help.</p>

            <div class="contact-item">
                <i class="fa-solid fa-envelope"></i>
                <span>contact@jbalapeak.com</span>
            </div>
            <div class="contact-item">
                <i class="fa-solid fa-phone"></i>
                <span>+212 600-123456</span>
            </div>
            <div class="contact-item">
                <i class="fa-solid fa-location-dot"></i>
                <span>Tanger, Morocco</span>
            </div>
        </div>

        <div class="form-box">
            @if(session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('send.email') }}" method="POST">
                @csrf <input type="text" name="subject" placeholder="Subject" required>
                
                <input type="email" name="user_email" placeholder="Your Email" required>
                
                <textarea name="message" rows="5" placeholder="How can we help?" required></textarea>
                
                <button type="submit" class="btn-submit">Send Message</button>
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