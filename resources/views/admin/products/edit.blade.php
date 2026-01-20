<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jbala Admin | Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">

<div class="card shadow p-4" style="width: 600px;">
    <h2 class="text-center text-warning mb-4">Edit Product</h2>

    <form action="{{ route('produits.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <div class="mb-3">
            <label>Name</label>
            <input type="text" name="nom" class="form-control" value="{{ $product->name }}">
        </div>

        <div class="row">
            <div class="col mb-3">
                <label>Price</label>
                <input type="number" name="prix" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="col mb-3">
                <label>Category</label>
                <input type="text" name="categorie" class="form-control" value="{{ $product->category }}">
            </div>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Change Image (Optional)</label>
            <input type="file" name="image" class="form-control">
            <div class="mt-2">
                <small>Current:</small>
                <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset($product->image) }}" width="60" class="rounded">
            </div>
        </div>

        <button type="submit" class="btn btn-warning w-100">Update Product</button>
        <a href="{{ route('produits.index') }}" class="btn btn-link w-100 mt-2 text-decoration-none text-secondary">Cancel</a>
    </form>
</div>

</body>
</html>