<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jbala Peak | Collection</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --bg-cream: #F9F7F2;
            --jbala-green: #143628;
            --accent-clay: #B07D62;
            --accent-gold: #C69C6D;
            --text-dark: #1A1A1A;
            --transition: all 0.4s ease;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: var(--bg-cream); color: var(--text-dark); font-family: 'Montserrat', sans-serif; }
        
        /* HEADER (Same as Home) */
        header { display: flex; justify-content: space-between; align-items: center; padding: 8px 5%; background: var(--jbala-green); position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        .brand img { height: 50px; }
        nav ul { display: flex; gap: 40px; list-style: none; }
        nav a { text-decoration: none; color: #fff; font-weight: 500; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 2px; }
        nav a:hover { color: var(--accent-gold); }

        /* COLLECTION HEADER */
        .page-header {
            text-align: center;
            padding: 80px 20px 40px;
            background: white;
        }
        .page-header h1 { font-family: 'Playfair Display', serif; font-size: 3rem; color: var(--jbala-green); }
        .divider { height: 3px; width: 80px; background: var(--accent-gold); margin: 20px auto; }

        /* GRID */
        .section { padding: 40px 8%; min-height: 60vh; }
        .cards-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; }
        
        .product-card { background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: var(--transition); position: relative; border: 1px solid rgba(0,0,0,0.05); }
        .product-card:hover { transform: translateY(-10px); border-color: var(--accent-gold); }
        .product-image-box { height: 350px; overflow: hidden; }
        .product-image-box img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; }
        .product-card:hover img { transform: scale(1.1); }
        .product-details { padding: 30px; text-align: center; }
        .category-tag { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; color: var(--accent-clay); display: block; margin-bottom: 10px; text-decoration: none; }
        .product-title { font-family: 'Playfair Display', serif; font-size: 1.5rem; color: var(--jbala-green); margin-bottom: 10px; }
        .product-price { font-size: 1.2rem; font-weight: 600; display: block; margin-bottom: 20px; }
        .btn-add-cart { padding: 12px 35px; border: 1px solid var(--jbala-green); color: var(--jbala-green); text-decoration: none; border-radius: 50px; text-transform: uppercase; font-weight: 600; transition: var(--transition); display: inline-block; }
        .btn-add-cart:hover { background: var(--jbala-green); color: white; }

        footer { background: #0f291e; text-align: center; padding: 40px; color: rgba(255,255,255,0.4); margin-top: 50px; }
    </style>
</head>
<body>

    <header>
        <div class="brand">
            <a href="{{ url('/') }}"><img src="{{ asset('logo.png') }}" alt="Jbala Peak"></a>
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">Our Story</a></li>
                <li><a href="{{ url('/products') }}" style="color: var(--accent-gold);">Collection</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="page-header">
        @if(isset($currentCategory))
            <h1>{{ $currentCategory }} Collection</h1>
            <p><a href="{{ url('/products') }}" style="color: var(--text-dark); text-decoration: none;">← Back to All Products</a></p>
        @else
            <h1>Full Collection</h1>
            <p>Authentic treasures from the Rif Mountains</p>
        @endif
        <div class="divider"></div>
    </div>

    <section class="section">
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

    <footer>
        <p>&copy; 2026 Jbala Peak. All Rights Reserved.</p>
    </footer>

</body>
</html>