@extends('layouts-user.layouts', ['menu' => 'store', 'submenu' => ''])

@section('title' , 'Store')

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

    <!-- ======= Product Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Featured Product</p>
            </header>
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    @foreach ($product as $item)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <img src="{{ asset('storage/'. $item->image ) }}" class="card-img-top" alt="{{ $item->name }}">
                            </div>
                            {{-- <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                            </p> --}}
                            <div class="profile mt-auto">
                                <h3>{{ $item->name }}</h3>
                                <span class="float-start"><s>Rp.{{ number_format($item->original_price) }}</s></span>
                                <span class="float-end">Rp.{{ number_format($item->selling_price) }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Product Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

          <header class="section-header">
            <p>All Categorie Product</p>
          </header>

          <div class="row">
            @foreach ($categorieproduct as $item)
            <div class="col-lg-4">
              <div class="post-box">
                <div class="post-img"><img src="{{ asset('storage/'. $item->image ) }}" class="img-fluid" alt=""></div>
                <h3 class="post-title">{{ $item->name }}</h3>
                <p>{{ $item->description }}</p>
                <a href="{{ route('viewcategorie.index', $item->slug ) }}" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
            @endforeach

          </div>

        </div>

      </section>
      <!-- End Recent Blog Posts Section -->


</main>
<!-- End #main -->

@endsection


