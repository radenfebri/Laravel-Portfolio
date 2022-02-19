@extends('layouts-user.layouts', ['menu' => 'blog', 'submenu' => ''])

@section('title' , "Raden Febri - $artikel->judul")

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="{{ url('blog/detail/'. $artikel->slug ) }}">{{ $artikel->judul }}</a></li>
            </ol>
            <h2>@yield('title') Page</h2>

        </div>
    </section>


    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            @if ($artikel->gambar_artikel)
                            <div class="entry-img">
                                <img src="{{ asset('storage/'. $artikel->gambar_artikel ) }}" alt="{{ $artikel->categories->nama_kategori }}" class="img-fluid">
                            </div>
                            @else
                            <div class="entry-img">
                                <img src="{{ asset('template') }}/images/faces/profile.jpg" alt="{{ $artikel->categories->nama_kategori }}" class="img-fluid">
                            </div>
                            @endif
                        </div>

                        <h2 class="entry-title">
                            <a href="#">{{ $artikel->judul }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{ route('author', $artikel->users->username ) }}">{{ $artikel->users->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#">{{date('d M Y',strtotime($artikel->created_at))}}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="">12 Comments</a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! $artikel->deskripsi !!}
                            </p>

                        </div>

                    </article><!-- End blog entry -->

                    <div class="blog-author d-flex align-items-center">
                        @if ($artikel->users->foto)
                        <img src="{{ asset('storage/'. $artikel->users->foto ) }}" class="rounded-circle float-left" alt="">
                        @else
                        <img src="{{ asset('template') }}/images/faces/profile.jpg" class="rounded-circle float-left" alt="">
                        @endif
                        <div>
                            <h4>{{ $artikel->users->name }}</h4>
                            <div class="social-links">
                                <a href="https://twitter.com/{{ $artikel->users->twitter }}"><i class="bi bi-twitter"></i></a>
                                <a href="https://facebook.com/{{ $artikel->users->facebook }}"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/{{ $artikel->users->instagram }}"><i class="biu bi-instagram"></i></a>
                                <a href="https://github.com/{{ $artikel->users->github }}"><i class="biu bi-github"></i></a>
                                <a href="https://{{ $artikel->users->website }}/"><i class="biu bi-globe"></i></a>
                            </div>
                            <p>
                                {{ $artikel->users->about }}.
                            </p>
                        </div>
                    </div><!-- End blog author bio -->

                    <div class="blog-comments">

                        <h4 class="comments-count">8 Comments</h4>

                        <div id="comment-2" class="comment">
                            @foreach ($artikel->comments as $item)
                                <div class="d-flex">
                                    @if ($item->user->foto)
                                        <div class="comment-img"><img src="{{ asset('storage/'. $item->user->foto ) }}" alt="{{ $item->user->name }}"></div>
                                    @else
                                        <div class="comment-img"><img src="{{ asset('template') }}/images/faces/profile.jpg" alt="{{ $item->user->name }}"></div>
                                    @endif

                                    <div>
                                        <h5><a href="{{ url('/',$item->user->username ) }}">{{ $item->user->name }}</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                        <time datetime="2020-01-01">{{date('d M Y',strtotime($item->created_at)) }}</time>
                                        <p>
                                            {{ $item->comment }}.
                                        </p>
                                    </div>
                                </div>

                                {{-- <div id="comment-reply-1" class="comment comment-reply">
                                    <div class="d-flex">
                                        <div class="comment-img"><img src="assets/img/blog/comments-3.jpg" alt=""></div>
                                        <div>
                                            <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                            <time datetime="2020-01-01">01 Jan, 2020</time>
                                            <p>
                                                Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                                                Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                                                Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                                            </p>
                                        </div>
                                    </div>

                                </div> --}}
                                <!-- End comment reply #1-->
                            @endforeach
                        </div>
                        <!-- End comment #2-->

                        @guest
                        <div class="reply-from">
                            <div class="row">
                                <div class="col form-group">
                                    <h4>Please Login in to Comment</h4>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="reply-form">
                            <h4>Leave a Reply</h4>
                            <p>Your email address will not be published. Required fields are marked * </p>
                            <form action="{{ route('comment.store', $artikel->id ) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col form-group">
                                        <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Post Comment</button>
                            </form>
                        </div>
                        @endguest

                    </div><!-- End blog comments -->

                </div><!-- End blog entries list -->

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
    </section><!-- End Blog Single Section -->

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


