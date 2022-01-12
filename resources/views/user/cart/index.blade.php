@extends('layouts-user.layouts', ['menu' => 'cart', 'submenu' => ''])

@section('title' , 'My Cart')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('store.index') }}">Store</a></li>
                <li><a href="{{ route('cartview.index') }}">My Cart</a></li>
            </ol>
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section>
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    @php $total = 0; @endphp
                    @foreach ($cartItem as $item)
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{ asset('storage/'. $item->product->image ) }}" height="70px" width="70px" alt="{{ $item->product->name }}">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{ $item->product->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>Rp.{{ number_format($item->product->selling_price) }}</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            @if ($item->product->qty >= $item->prod_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    <button type="button" class="input-group-text changeQuantity btn btn-danger decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                                    <button type="button" class="input-group-text changeQuantity btn btn-success increment-btn" >+</button>
                                </div>
                                @php $total += $item->product->selling_price * $item->prod_qty; @endphp
                            @else
                                <h6>Out of Stock</h6>
                            @endif

                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-cart-item"><i class="fas fa-trash-alt"></i> Remove</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <h6>
                        Total Price : Rp.<b>{{ number_format($total) }}</b>

                        <a href="{{ route('checkout.index') }}" class="btn btn-outline-success float-end">Checkout</a>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing Section -->


</main>
<!-- End #main -->

@endsection


