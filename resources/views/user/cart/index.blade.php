@extends('layouts-user.layouts', ['menu' => 'cart', 'submenu' => ''])

@section('title' , 'My Cart')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>@yield('title')</li>
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
                    @foreach ($cartItem as $item)
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{ asset('storage/'. $item->product->image ) }}" height="70px" width="70px" alt="{{ $item->product->name }}">
                        </div>
                        <div class="col-md-5">
                            <h6>{{ $item->product->name }}</h6>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px">
                                <button type="button" class="input-group-text btn btn-danger decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                                <button type="button" class="input-group-text btn btn-success increment-btn" >+</button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger delete-cart-item"><i class="fas fa-trash-alt"></i> Remove</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing Section -->


</main>
<!-- End #main -->

@endsection


