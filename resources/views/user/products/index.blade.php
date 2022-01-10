@extends('layouts-user.layouts', ['menu' => 'store', 'submenu' => ''])

@section('title' , $product->name )

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>{{ $categorieproduct->name }}</li>
                <li>@yield('title')</li>
            </ol>
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    {{-- <section id="pricing" class="pricing">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Categorie : {{ $product->name }}</p>
            </header>

            <div class="row gy-4" data-aos="fade-left">
                @foreach ($product as $item)
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="box">
                        <span class="featured">Featured</span>
                        <h3 style="color: #65c600;">{{ $item->name }}</h3>

                        <div class="price"><sup>Rp</sup><s>{{ number_format($item->original_price) }}</s></div>
                        <div class="price"><sup>Rp</sup>{{ number_format($item->selling_price) }}</div>
                        <div><img src="{{ asset('storage/'. $item->image ) }}" class="card-img-top" alt="{{ $item->name }}"></div>
                        <img src="assets/img/pricing-starter.png" class="img-fluid" alt="">
                        <ul>
                            <li>{{ $item->description }}</li>
                            <li>{{ $item->slug }}</li>
                        </ul>
                        <a href="{{ url('categorie-product/'.$categorieproduct->slug.'/'.$item->slug) }}" class="btn-buy">Detail</a>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </section> --}}
    <!-- End Pricing Section -->


    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="{{ asset('storage/'. $product->image) }}"  style="width: 80%; height: 80%;" alt="">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Product Information</h3>
                        <p><a type="button" class="btn btn-success">{{ $product->trending == '1' ? 'Trending':'' }}</a></p>
                        <ul>
                            <li><strong>Category</strong>: {{ $categorieproduct->name }}</li>
                            <li><strong>Harga Asli</strong>: <s>Rp.{{ number_format($product->original_price) }}</s></li>
                            <li><strong>Harga Promo</strong>: Rp.{{ number_format($product->selling_price) }}</li>
                            {{-- <span class="float-start"></span>
                            <span class="float-end"></span> --}}
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>{{ $product->name }}</h2>
                        <p>
                            {{ $product->description }}.
                        </p>

                        @if ($product->qty > 0)
                        <label class="btn-success btn-sm">In stock</label>
                        @else
                        <label class="btn-danger btn-sm">Out of stock</label>
                        @endif
                        <br>
                        <hr>

                        {{-- <div class="container">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                            <span class="glyphicon glyphicon-minus">-</span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control text-center input-number" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus">+</span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist</button>
                                <button type="button" class="btn btn-primary me-3 float-start">Add to Cart</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->


</main>
<!-- End #main -->

@endsection


@section('scripts')
<script>
    $(document).ready(function(){

        var quantitiy=0;
        $('.quantity-right-plus').click(function(e){

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if(quantity>0){
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
@endsection


