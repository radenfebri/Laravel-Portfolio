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


    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details product_data">
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

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <input type="hidden" value="{{ $product->id }}" class="prod_id" id="">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                            <span class="glyphicon glyphicon-minus">-</span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control qty-input text-center input-number" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus">+</span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <i class="fas fa-cart-plus"></i></button>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i class="fas fa-heart"></i></button>
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
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
        });

        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            if(quantity>0){
                $('#quantity').val(quantity - 1);
            }
        });

        $('.addToCartBtn').click(function(e){
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();

            // alert(product_id);
            // alert(product_qty);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id' : product_id,
                    'product_qty' : product_qty,
                },
                success: function(response) {
                    alert(response.status);
                }
            });
        });

    });
</script>
@endsection


