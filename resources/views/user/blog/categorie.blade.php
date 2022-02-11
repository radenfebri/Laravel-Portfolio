@extends('layouts-user.layouts', ['menu' => 'blog', 'submenu' => ''])

@section('title' , "Raden Febri - Categorie $kategori->nama_kategori")

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="{{ url('/blog/categorie', $kategori->slug) }}">{{ $kategori->nama_kategori }}</a></li>
            </ol>
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Categorie : {{ $kategori->nama_kategori }}</p>
            </header>

            <div class="row">

                @forelse ($artikel as $item)
                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img">
                                @if ($item->gambar_artikel)
                                    <img src="{{ asset('storage/'. $item->gambar_artikel ) }}" class="img-fluid" alt="{{ $item->judul }}">
                                @else
                                    <img src="{{ asset('template') }}/images/faces/profile.jpg" class="img-fluid" alt="{{ $item->judul }}">
                                @endif
                            </div>
                            <span class="post-date">Tue, September 15</span>
                            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @empty
                    <center><strong>Data Masih Kosong</strong></center>
                @endforelse

            </div>

        </div>

    </section>
    <!-- End Recent Blog Posts Section -->



</main>
<!-- End #main -->


@endsection


