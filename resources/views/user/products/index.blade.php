@extends('layouts-user.layouts', ['menu' => 'store', 'submenu' => ''])

@section('title' , "Product $product->name" )

@section('content')


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('rating') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{ $product->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if ($user_rating)

                                @for($i = 1; $i<= $user_rating->stars_rated; $i++)
                                    <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                    <label for="rating{{$i}}" class="fa fa-star checked"></label>
                                @endfor
                                @for($j = $user_rating->stars_rated+1; $j <= 5; $j++)
                                    <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                    <label for="rating{{$j}}" class="fa fa-star checked"></label>
                                @endfor

                            @else
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


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
                                <img src="{{ asset('storage/'. $product->image) }}"  style="width: 70%; height: 70%;" alt="{{ $product->name }}">
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
                        <div class="row">
                            <div class="col-md-2">
                                <h2>Detail</h2>
                            </div>
                            &nbsp;
                            <div class="col-md-4">
                                @if ($product->qty > 0)
                                <label class="btn-success btn-sm">In stock</label>
                            @else
                                <label class="btn-danger btn-sm">Out of stock</label>
                            @endif
                            </div>
                        </div>
                        @php $ratenum = number_format($rating_value)  @endphp
                        <div class="rating">
                            @for($i = 1; $i <= $ratenum; $i++)
                                <i class="fas fa-star checked"></i>
                            @endfor
                            @for($j = $ratenum+1; $j <= 5; $j++)
                                <i class="fas fa-star"></i>
                            @endfor
                            <span>
                                @if ($rating->count() > 0)
                                    {{ $rating->count() }} Rating
                                @else
                                    No Ratings
                                @endif
                            </span>
                        <p class="mt-3">
                            {{ $product->small_description }}.
                        </p>

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
                <h2><b>Description</b></h2>
                <p class="mt-3">
                    {{ $product->description }}
                </p>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate This Product
                    </button>
                    <a href="{{ url('add-review/'.$product->slug.'/userreview' ) }}" class="btn btn-outline-primary">
                       Write a Product
                    </a>
                </div>
                <div class="col-md-8">
                    @foreach ($reviews as $item)
                        <div class="user-reviews mt-3">
                            <label for=""><b>{{ $item->user->name }}</b></label>
                            @if ($item->user_id == Auth::id())
                                <a href="{{ url('review-edit/'.$product->slug.'/userreview') }}">edit</a>
                            @endif
                            <br>
                            @php

                            $rating = App\Models\Rating::where('prod_id', $product->id)->where('user_id', $item->user->id)->first();

                            @endphp
                            @if ($rating)
                            @php $user_rated = $rating->stars_rated @endphp
                                @for($i = 1; $i <= $user_rated; $i++)
                                    <i class="fas fa-star checked"></i>
                                @endfor
                                @for($j = $user_rated+1; $j <= 5; $j++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            @endif
                            <small>Review on {{ $item->created_at->format('d M Y') }}</small>
                            <p>
                                {{ $item->user_review }}.
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->


</main>
<!-- End #main -->

@endsection






