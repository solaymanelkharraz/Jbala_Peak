<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jbala Peak | Our Story</title>
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

        /* HEADER - TRANSPARENT INITIALLY */
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
            background-image: url('art.jfif');
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
            background: rgba(0, 0, 0, 0.4);
        }

        /* Slightly lighter overlay so image pops */
        .page-header h1 {
            position: relative;
            z-index: 2;
            color: white;
            font-size: 5rem;
            font-style: italic;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        /* ABOUT CONTENT */
        .section {
            padding: 120px 8%;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .about-text h2 {
            font-size: 3.5rem;
            color: var(--jbala-green);
            line-height: 1.2;
            margin-bottom: 30px;
        }

        .about-text p {
            color: #555;
            font-size: 1.2rem;
            margin-bottom: 25px;
            font-weight: 300;
        }

        .divider {
            height: 3px;
            width: 80px;
            background: var(--accent-gold);
            margin: 0 0 40px 0;
        }

        .about-visual {
            height: 600px;
            background-image: url('chefchaouen-tours.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            position: relative;
            box-shadow: 30px 30px 0 var(--jbala-green);
        }

        .about-visual::after {
            content: '';
            position: absolute;
            inset: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
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
            <a href="{{ url('/') }}">.<img src="logo.png" alt="Jbala Peak"></a>
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}" style="color: var(--accent-gold);">Our Story</a></li>
                <li><a href="{{ url('/products') }}">Collection</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
                <li>
                    <a href="{{ route('produits.index') }}"
                        style="background-color: var(--jbala-green); color: white; padding: 8px 20px; border-radius: 20px; font-weight: bold; border: 1px solid var(--accent-gold);">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="https://jbala-react-client.vercel.app" target="_blank"
                        style="border: 1px solid var(--accent-gold); color: var(--accent-gold); padding: 5px 15px; border-radius: 20px;">
                        API Client (React)
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="page-header">
        <h1>Our Story</h1>
    </div>

    <section class="section">
        <div class="about-grid">
            <div class="about-text">
                <h2>The Spirit of <br> The Mountains</h2>
                <div class="divider"></div>
                <p><strong>Jbala Peak</strong> is a bridge to the rich cultural heritage of Northern Morocco. Founded to
                    preserve the artisanal traditions of the Rif region, we specialize in authentic craftsmanship passed
                    down for generations.</p>
                <p>From the distinct <em>Tagine</em> clay pottery of the local artisans to the rugged, warm wool of the
                    traditional <em>Jelbab</em>, every item tells a story of the land.</p>
                <p>We believe in sustainability and honoring the "Maalem" (Master Craftsman). Every product you purchase
                    supports local families in Chefchaouen and the surrounding villages.</p>
            </div>
            <div class="about-visual"></div>
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