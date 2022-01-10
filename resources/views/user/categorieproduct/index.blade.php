@extends('layouts-user.layouts', ['menu' => 'store', 'submenu' => ''])

@section('title' , 'View Categorie')

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
    <section id="pricing" class="pricing">

        <div class="container" data-aos="fade-up">

          <header class="section-header">
            <p>Categorie : {{ $categorieproduct->name }}</p>
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
                </ul>
                <a href="{{ url('categorie-product/'.$categorieproduct->slug.'/'.$item->slug) }}" class="btn-buy">Detail</a>
              </div>
            </div>
            @endforeach

          </div>

        </div>

      </section>
      <!-- End Pricing Section -->


</main>
<!-- End #main -->

@endsection


