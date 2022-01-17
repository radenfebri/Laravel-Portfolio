@extends('layouts-user.layouts', ['menu' => 'wishlist', 'submenu' => ''])

@section('title' , 'Wishlist')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
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
                    @if ($wishlist->count() > 0)

                        @foreach ($wishlist as $item)
                            <div class="row product_data">
                                <div class="col-md-2">
                                    @if ($item->product->image)
                                        <img src="{{ asset('storage/'. $item->product->image ) }}" height="70px" width="70px" alt="{{ $item->product->name }}">
                                    @else
                                        <img src="{{ asset('template') }}/images/faces/profile.jpg" height="70px" width="70px" alt="{{ $item->product->name }}">
                                    @endif
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6>{{ $item->product->name }}</h6>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6>Rp.{{ number_format($item->product->selling_price) }}</h6>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                    @if ($item->product->qty >= $item->prod_qty)
                                        <label for="Quantity">Quantity</label>
                                        <div class="input-group text-center mb-3" style="width: 130px">
                                            <button type="button" class="input-group-text  btn btn-danger decrement-btn">-</button>
                                            <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                            <button type="button" class="input-group-text  btn btn-success increment-btn" >+</button>
                                        </div>
                                    @else
                                        <h6>Out of Stock</h6>
                                    @endif

                                </div>
                                <div class="col-md-2 my-auto">
                                    <button class="btn btn-success addToCartBtn"><i class="fas fa-cart-plus"></i> Add To Cart</button>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <button class="btn btn-danger remove-wishlist-item"><i class="fas fa-trash-alt"></i> Remove</button>
                                </div>
                            </div>
                        @endforeach

                    @else

                        <h4>There are no products in your Wishlist</h4>

                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing Section -->


</main>
<!-- End #main -->

@endsection


