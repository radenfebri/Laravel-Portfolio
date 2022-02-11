@extends('layouts-user.layouts', ['menu' => 'blog', 'submenu' => ''])

@section('title' , "Raden Febri - Author")

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="#">NAMA</a></li>
            </ol>
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Author : {{ $articles->name }}</p>
            </header>

            <div class="row">

                @forelse ($articles as $item)
                <div class="col-lg-4 mb-5">
                    <div class="post-box">
                        <div class="post-img">
                            @if ($item->gambar_artikel)
                            <img src="{{ asset('storage/'. $item->gambar_artikel ) }}" class="img-fluid" alt="{{ $item->judul }}">
                            @else
                            <img src="{{ asset('template') }}/images/faces/profile.jpg" class="img-fluid" alt="{{ $item->judul }}">
                            @endif
                        </div>
                        <span class="post-date">{{date('d M Y',strtotime($item->created_at))}}</span>
                        <h3 class="post-title">{{ $item->judul }}</h3>
                        <a href="{{ route('detail', $item->slug) }}" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                @empty
                <center><strong>Data Masih Kosong</strong></center>
                @endforelse

                {{-- <div>{{ $articles->links() }}</div> --}}

            </div>

        </div>

    </section>
    <!-- End Recent Blog Posts Section -->



</main>
<!-- End #main -->


@endsection


