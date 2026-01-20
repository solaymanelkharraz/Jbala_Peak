<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jbala Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light p-5">

<div class="container bg-white p-5 rounded shadow">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-success"><i class="fas fa-layer-group"></i> Product Dashboard</h2>
        <a href="{{ route('produits.create') }}" class="btn btn-success btn-lg shadow-sm">
            <i class="fas fa-plus-circle"></i> Add New Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset($product->image) }}" 
                         width="60" height="60" class="rounded object-fit-cover">
                </td>
                <td class="fw-bold">{{ $product->name }}</td>
                <td>{{ $product->price }} MAD</td>
                <td><span class="badge bg-secondary">{{ $product->category }}</span></td>
                <td class="text-end">
                    <a href="{{ route('produits.edit', $product->id) }}" class="btn btn-warning btn-sm me-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                        <i class="fas fa-trash"></i> Delete
                    </button>

                    <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-start">
                                    Are you sure you want to delete <strong>{{ $product->name }}</strong>?
                                    <br><small class="text-danger">This action cannot be undone.</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('produits.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 40px; display: flex; justify-content: center;">
        {{ $products->links('vendor.pagination.custom') }}
    </div>

    <div class="text-center mt-4">
        <a href="{{ url('/') }}" class="text-secondary text-decoration-none">
            <i class="fas fa-arrow-left"></i> Return to Jbala Shop
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>