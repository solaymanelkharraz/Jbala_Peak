@extends('layouts.app')

@section('content')
    <style>
        :root {
            --bg-cream: #F9F7F2;
            --jbala-green: #143628;
            --accent-gold: #C69C6D;
        }

        .cart-container {
            margin-top: 120px;
            padding-bottom: 80px;
        }

        .cart-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            background: white;
        }

        .table thead {
            background-color: var(--jbala-green);
            color: white;
        }

        .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        .btn-checkout {
            background-color: var(--accent-gold);
            color: white;
            padding: 15px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            display: block;
            text-align: center;
            text-decoration: none;
        }
    </style>

    <div class="container cart-container">
        <div class="row">
            <div class="col-lg-8">
                <h2 style="font-family: 'Playfair Display'; color: var(--jbala-green)">Your Shopping Cart</h2>
                <div class="card cart-card p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr>
                                        <td>
                                            <img src="{{ asset($details['photo']) }}" class="product-img me-2">
                                            <strong>{{ $details['name'] }}</strong>
                                        </td>
                                        <td>{{ $details['price'] }} MAD</td>
                                        <td>
                                            <form action="{{ route('update.cart') }}" method="POST" class="update-form">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <input type="number" name="quantity" value="{{ $details['quantity'] }}"
                                                    class="quantity-input" min="1" onchange="this.form.submit()">
                                            </form>
                                        </td>
                                        <td>{{ $details['price'] * $details['quantity'] }} MAD</td>
                                        <td>
                                            <form action="{{ route('remove.from.cart') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <button type="submit" class="btn text-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Your cart is empty.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card cart-card p-4">
                    <h4 class="mb-4" style="font-family: 'Playfair Display', serif;">Order Summary</h4>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <span>{{ $total }} MAD</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping</span>
                        <span class="text-success">Free</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold fs-5">Total</span>
                        <span class="fw-bold fs-5" style="color: var(--jbala-green)">{{ $total }} MAD</span>
                    </div>

                    <a href="#" class="btn btn-checkout w-100">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
@endsection