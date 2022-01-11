@extends('layouts-user.layouts', ['menu' => 'store', 'submenu' => ''])

@section('title' , "Checkout" )

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="">Store</a></li>
                <li><a href=""></a>Cehckout</li>
            </ol>
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->


    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details product_data">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6><b>Data Detail</b></h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name=""  id="" readonly>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="" id="" readonly>
                                </div>
                                <div class="mt-2">
                                    <label for="">Alamat</label>
                                    <textarea type="text" class="form-control" value="" name="" id="" readonly>{{ Auth::user()->alamat }}</textarea>
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
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>{{ $item->product->selling_price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <hr> --}}
                            <button class="btn btn-primary float-end">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Details Section -->


</main>
<!-- End #main -->

@endsection




