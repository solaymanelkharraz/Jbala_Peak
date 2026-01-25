@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 style="color: var(--jbala-green); font-size: 2.5rem; margin-bottom: 5px;">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="text-muted">Here is what is happening with your account today.</p>
        </div>
        <div class="card p-3 border-0 shadow-sm" style="background: #eef5f2; min-width: 200px;">
            <small class="text-uppercase text-muted fw-bold">Member Status</small>
            <strong style="color: var(--jbala-green); font-size: 1.2rem;">Active Client</strong>
        </div>
    </div>

    <div class="card mb-5 border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
        <div class="card-header bg-white py-3">
            <h4 class="m-0" style="color: var(--jbala-green); font-family: 'Playfair Display', serif;">
                <i class="fas fa-box-open me-2"></i> My Recent Orders
            </h4>
        </div>
        <div class="card-body p-4 text-center">
            @if(count($myOrders) > 0)
                {{-- Future Code for listing orders will go here --}}
            @else
                <div class="py-4">
                    <i class="fas fa-shopping-basket mb-3" style="font-size: 3rem; color: #ddd;"></i>
                    <p class="text-muted">You haven't placed any orders yet.</p>
                    <a href="{{ route('shop.index') }}" class="btn btn-outline-success" style="border-radius: 20px;">
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="mb-3">
        <h2 style="color: var(--jbala-green); font-family: 'Playfair Display', serif;">
            <i class="fas fa-tags me-2" style="color: var(--accent-gold);"></i> Selected For You
        </h2>
        <p class="text-muted">Exclusive deals just for our members.</p>
    </div>

    <div class="row">
        @foreach($suggestedProducts as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100 border-0 shadow-sm product-card" style="border-radius: 15px; overflow: hidden;">
                <div style="position: absolute; top: 10px; right: 10px; background: var(--accent-gold); color: white; padding: 5px 10px; border-radius: 20px; font-size: 0.7rem; font-weight: bold;">
                    SPECIAL OFFER
                </div>

                <div style="height: 200px; overflow: hidden;">
                     {{-- Handle Image Display --}}
                     @if(Str::startsWith($product->image, 'http'))
                        <img src="{{ $product->image }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $product->name }}">
                     @else
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $product->name }}">
                     @endif
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title" style="font-family: 'Playfair Display', serif; color: var(--jbala-green);">{{ $product->name }}</h5>
                    <p class="card-text fw-bold" style="color: var(--text-dark);">{{ $product->price }} MAD</p>
                    <a href="{{ route('shop.index') }}" class="btn btn-sm" style="border: 1px solid var(--jbala-green); color: var(--jbala-green); border-radius: 20px;">
                        View Details
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection