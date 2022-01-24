@extends('layouts-user.layouts', ['menu' => 'akun', 'submenu' => 'myorder'])

@section('title' , "Product Review" )

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            {{-- <ol>
                <li><a href="{{ route('store.index') }}">Store</a></li>
                <li><a href="{{ route('myorder.index') }}">My Orders</a></li>
                <li><a href=""></a>Review</li>
            </ol> --}}
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->


    <!-- ======= Portfolio Details Section ======= -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            @if ($verified_purchase->count() > 0)
                                <h5>You are writing a review for <b>{{ $product->name }}</b></h5>
                                <form action="{{ url('/add-review') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                                    <textarea class="form-control" name="user_review" id="user_review" placeholder="Write a review" cols="" rows="5"></textarea>
                                    <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                                </form>
                            @else
                                <div class="alert alert-danger">
                                    <h5>You are not elingible to review this product</h5>
                                    <p>
                                        For to trusthworthiness of the reviews, only customers who purchase
                                        the product can write a review about the product.
                                    </p>
                                    <a href="/" class="btn btn-primary mt-3">Go to home page</a>
                                </div>
                            @endif
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




