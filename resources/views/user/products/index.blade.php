@extends('layouts-user.layouts', ['menu' => 'store', 'submenu' => ''])

@section('title' , "Product $product->name" )

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('store.index') }}">Store</a></li>
                <li><a href="{{ route('viewcategorie.index', $categorieproduct->slug ) }}">{{ $categorieproduct->name }}</a></li>
                <li><a href="{{ url('categorie-product/'.$categorieproduct->slug.'/'.$product->slug) }}">{{ $product->name }}</a></li>
            </ol>
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->


    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details product_data">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                @if ($product->image)
                                <img src="{{ asset('storage/'. $product->image) }}"  style="width: 80%; height: 80%;" alt="{{ $product->name }}">
                                @else
                                <img src="{{ asset('template') }}/images/faces/profile.jpg"  style="width: 80%; height: 80%;" alt="{{ $product->name }}">
                                @endif
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Product Information</h3>
                        <p>
                            @if ($product->trending == '1')
                            <a type="button" class="btn btn-danger">{{ $product->trending == '1' ? 'Trending':'' }}</a>
                            @else

                            @endif
                        </p>
                        <ul>
                            <li><strong>Category</strong>: {{ $categorieproduct->name }}</li>
                            <li><strong>Harga Asli</strong>: <s>Rp.{{ number_format($product->original_price) }}</s></li>
                            <li><strong>Harga Promo</strong>: Rp.{{ number_format($product->selling_price) }}</li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Detail</h2>
                        <p>
                            {{ $product->small_description }}.
                        </p>

                        @if ($product->qty > 0)
                        <label class="btn-success btn-sm">In stock</label>
                        @else
                        <label class="btn-danger btn-sm">Out of stock</label>
                        @endif
                        <br>
                        <hr>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <input type="hidden" value="{{ $product->id }}" class="prod_id" id="">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-btn">
                                        <button type="button" class="input-group-text btn btn-danger decrement-btn">
                                            <span class="glyphicon glyphicon-minus">-</span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control qty-input text-center input-number" value="1">
                                    <span class="input-group-btn">
                                        <button type="button" class="input-group-text btn btn-success increment-btn" >
                                            <span class="glyphicon glyphicon-plus">+</span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                @if ($product->qty > 0)
                                <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <i class="fas fa-cart-plus"></i></button>
                                @else
                                @endif
                                <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist <i class="fas fa-heart"></i></button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <br>

            <hr>
            <div class="container">
                <h2><b>{{ $product->name }}</b></h2>
                {{ $product->description }}
            </div>

        </div>
    </section><!-- End Portfolio Details Section -->


</main>
<!-- End #main -->

@endsection




