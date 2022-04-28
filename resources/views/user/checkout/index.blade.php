@extends('layouts-user.layouts', ['menu' => 'cart', 'submenu' => ''])

@section('title' , "Checkout" )

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('store.index') }}">Store</a></li>
                <li><a href="{{ route('cartview.index') }}">Cart</a></li>
                <li><a href=""></a>Cehckout</li>
            </ol>
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->


    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details product_data">
        <div class="container">
            <form action="{{ url('place-order') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="card shadow">
                            <div class="card-body">
                                <h6><b>Data Detail</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',Auth::user()->name) }}" name="name"  id="name" >
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',Auth::user()->email) }}" name="email" id="email" >
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="">Alamat</label>
                                        <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" value="" name="alamat" id="alamat" >{{ old('alamat',Auth::user()->alamat) }}</textarea>
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card shadow">
                            <div class="card-body">
                                <h6><b>Order Detail</b></h6>
                                <hr>
                                @if ($cartitem->count() > 0)

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartitem as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>Rp.{{ number_format($item->products->selling_price) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary w-100">Place Order</button>

                                @else

                                <h2 class="text-center"><strong>No Product in Cart</strong></h2>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Portfolio Details Section -->


</main>
<!-- End #main -->

@endsection




