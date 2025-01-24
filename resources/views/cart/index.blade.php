@extends('layouts.backend')
@include('backup.topbar')
@include('backup.navbar')



@section('index')
<div class="container mt-4">
    <h1>Your Shopping Cart</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (empty($cartItems))
        <p>Your cart is empty.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ $item['price'] }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control" style="width: 80px;">
                                <button type="submit" class="btn btn-primary btn-sm mt-1">Update</button>
                            </form>
                        </td>
                        <td>${{ $item['price'] * $item['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.destroy', $item['product_id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center">
            <h4><strong>Total: ${{ $total }}</strong></h4>
            <a href=" {{route('checkout')}} ">Checkout</a>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Clear Cart</button>
            </form>
        </div>
    @endif
</div>


@include('backup.footer')
@endsection
