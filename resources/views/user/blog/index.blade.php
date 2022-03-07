@extends('layouts-user.layouts', ['menu' => 'blog', 'submenu' => ''])

@section('title' , 'Raden Febri - Blog')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
            </ol>
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    @forelse ($artikel as $item)
                    <article class="entry">

                        @if ($item->gambar_artikel)
                        <div class="entry-img">
                            <img src="{{ asset('storage/'. $item->gambar_artikel ) }}" alt="{{ $item->categories->nama_kategori }}" class="img-fluid">
                        </div>
                        @else
                        <div class="entry-img">
                            <img src="{{ asset('template') }}/images/faces/profile.jpg" alt="{{ $item->categories->nama_kategori }}" class="img-fluid">
                        </div>
                        @endif

                        <h2 class="entry-title">
                            <a href="{{ route('detail', $item->slug) }}">{{ $item->judul }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{ route('author', $item->users->username ) }}">{{ $item->users->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{ route('detail', $item->slug) }}">{{date('d M Y',strtotime($item->created_at))}}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="{{ route('detail', $item->slug) }}">{{ $item->comments->count() }} Comments</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-heart"></i> <a href="{{ route('detail', $item->slug) }}">{{ $item->likedUsers->count() }} Like</a></li>
                                {{-- <i class="bi bi-heart" style="color: red"></i> --}}
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! \Illuminate\Support\Str::words($item->deskripsi, 100,'....') !!}
                            </p>
                            <div class="read-more">
                                <a href="{{ route('detail', $item->slug) }}">Read More</a>
                            </div>
                        </div>

                    </article>
                    @empty
                    <article class="entry">
                        <center><strong>Data Kosong</strong></center>
                    </article>
                    @endforelse
                    <!-- End blog entry -->


                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li>{{ $artikel->links() }}</li>
                        </ul>
                    </div>


                </div>
                <!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="{{ route('searchartikel') }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" id="search_artikel" name="artikel_name">
                                <button type="submit" class="input-group-text"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                        <!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                @foreach ($kategori as $item)
                                <li><a href="{{ route('blog.categorie', $item->slug ) }}">{{ $item->nama_kategori }} <span>({{ $item->articles->count() }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End sidebar categories-->

                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            @forelse ($postinganTerbaru as $item)
                            <div class="post-item clearfix">
                                @if ($item->gambar_artikel)
                                <img src="{{ asset('storage/'. $item->gambar_artikel ) }}" alt="{{ $item->categories->nama_kategori }}">
                                @else
                                <img src="{{ asset('template') }}/images/faces/profile.jpg" alt="{{ $item->categories->nama_kategori }}">
                                @endif
                                <h4><a href="{{ route('detail', $item->slug) }}">{{ $item->judul }}</a></h4>
                                <time datetime="2020-01-01">{{date('d M Y',strtotime($item->created_at))}}</time>
                            </div>
                            @empty

                            @endforelse
                        </div>
                        <!-- End sidebar recent posts-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main>
<!-- End #main -->

<script>
    var availableTags = [];
    $.ajax({
        type: "GET",
        url: "/artikel-list",
        success: function (response) {
            startAutoComplete(response);
        }
    });

    function startAutoComplete(availableTags)
    {
        $( "#search_artikel" ).autocomplete({
            source: availableTags
        });
    }

</script>


@endsection


