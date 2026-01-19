<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jbala Admin | Add Product</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --cream: #F9F7F2;
            --green: #143628;
            --gold: #C69C6D;
        }

        body {
            background: var(--cream);
            font-family: 'Montserrat', sans-serif;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .admin-card {
            background: white;
            width: 100%;
            max-width: 700px;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(20, 54, 40, 0.1);
            border: 1px solid rgba(198, 156, 109, 0.2);
        }

        h2 {
            font-family: 'Playfair Display', serif;
            color: var(--green);
            text-align: center;
            font-size: 2.2rem;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 40px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .full-width {
            grid-column: span 2;
        }

        label {
            display: block;
            color: var(--green);
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 8px;
            background: #FAFAFA;
            font-family: inherit;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: var(--gold);
            background: white;
            outline: none;
            box-shadow: 0 0 10px rgba(198, 156, 109, 0.1);
        }

        /* Custom File Upload Styling */
        .file-upload-wrapper {
            position: relative;
            height: 150px;
            border: 2px dashed #ddd;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: pointer;
            transition: 0.3s;
            background: #fafafa;
        }

        .file-upload-wrapper:hover {
            border-color: var(--gold);
            background: #fffbf5;
        }

        .file-upload-wrapper i {
            font-size: 2rem;
            color: var(--gold);
            margin-bottom: 10px;
        }

        .file-upload-wrapper p {
            color: #999;
            font-size: 0.9rem;
            margin: 0;
        }

        .file-upload-wrapper input {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .btn-save {
            background: var(--green);
            color: white;
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            margin-top: 30px;
            transition: 0.3s;
        }

        .btn-save:hover {
            background: var(--gold);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .alert {
            padding: 15px;
            background: #d4edda;
            color: #155724;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            text-align: center;
        }

        .error {
            color: #dc3545;
            font-size: 0.8rem;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="admin-card">
        <h2>Add New Treasure</h2>
        <p class="subtitle">Expand the Jbala Peak Collection</p>

        @if(session('success'))
            <div class="alert"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">

                <div class="full-width">
                    <label>Product Name</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" placeholder="e.g. Royal Rif Carpet">
                    @error('nom') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label>Price (MAD)</label>
                    <input type="number" name="prix" value="{{ old('prix') }}" placeholder="0.00">
                    @error('prix') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label>Category</label>
                    <select name="categorie">
                        <option value="Pottery">Pottery</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Organic Food">Organic Food</option>
                        <option value="Decor">Home Decor</option>
                    </select>
                </div>

                <div class="full-width">
                    <label>Description</label>
                    <textarea name="description" rows="4"
                        placeholder="Tell the story of this product...">{{ old('description') }}</textarea>
                    @error('description') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="full-width">
                    <label>Product Image</label>
                    <div class="file-upload-wrapper">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Click to upload or drag image here</p>
                        <input type="file" name="image">
                    </div>
                    @error('image') <div class="error">{{ $message }}</div> @enderror
                </div>
            </div>

            <button type="submit" class="btn-save">Publish Product</button>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ url('/') }}" style="color: #999; text-decoration: none; font-size: 0.9rem;">← Return Home</a>
        </div>
    </div>

</body>

</html>