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
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="">{{ $artikel->comments->count() }} Comments</a></li>
                                @guest
                                    <li class="d-flex align-items-center"><i class="bi bi-heart"></i> {{ $artikel->comments->count() }} Like</></li>
                                @else
                                    <li class="d-flex align-items-center"><i class="bi bi-heart{{ Auth::user()->likedArticle()->where('article_id', $artikel->id)->count() > 0 ? '-fill' : ''  }}"
                                        style="color: {{ Auth::user()->likedArticle()->where('article_id', $artikel->id)->count() > 0 ? 'red' : ''  }}">
                                        <a href="#" onclick="document.getElementById('like-form-{{ $artikel->id }}').submit();"></i>{{ $artikel->likedUsers->count() }} Like</a>
                                    </li>
                                    <form action="{{ route('artikel.like', $artikel->id ) }}" method="POST" style="display: none" id="like-form-{{ $artikel->id }}">
                                    @csrf
                                    </form>
                                @endguest
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
                                @if ($artikel->users->twitter)
                                <a href="https://twitter.com/{{ $artikel->users->twitter }}"><i class="bi bi-twitter"></i></a>
                                @else

                                @endif
                                {{-- end twitter --}}

                                @if ($artikel->users->facebook)
                                <a href="https://facebook.com/{{ $artikel->users->facebook }}"><i class="bi bi-facebook"></i></a>
                                @else

                                @endif
                                {{-- end facebook --}}

                                @if ($artikel->users->instagram)
                                <a href="https://instagram.com/{{ $artikel->users->instagram }}"><i class="biu bi-instagram"></i></a>
                                @else

                                @endif
                                {{-- end instagram --}}

                                @if ($artikel->users->github)
                                <a href="https://github.com/{{ $artikel->users->github }}"><i class="biu bi-github"></i></a>
                                @else

                                @endif
                                {{-- end github --}}

                                @if ($artikel->users->website)
                                <a href="https://{{ $artikel->users->website }}/"><i class="biu bi-globe"></i></a>
                                @else

                                @endif
                                {{-- end github --}}
                            </div>
                            <p>
                                @if ($artikel->users->about)
                                {{ $artikel->users->about }}.
                                @else

                                @endif
                                {{-- end about --}}
                            </p>
                        </div>
                    </div>
                    <!-- End blog author bio -->

                    <div class="blog-comments">

                        <h4 class="comments-count">{{ $artikel->comments->count() }} Comments</h4>

                        {{-- <div id="comment-2" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>
                                <div>
                                    <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                    <time datetime="2020-01-01">01 Jan, 2020</time>
                                    <p>
                                        Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                                    </p>
                                </div>
                            </div>

                            <div id="comment-reply-1" class="comment comment-reply">
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

                            </div>
                            <!-- End comment reply #1-->

                        </div> --}}
                        <!-- End comment #2-->

                        <div id="comment-2" class="comment">
                            @foreach ($artikel->comments as $item)
                            <div class="d-flex">
                                @if ($item->user->foto)
                                <div class="comment-img"><img src="{{ asset('storage/'. $item->user->foto ) }}" alt="{{ $item->user->name }}"></div>
                                @else
                                <div class="comment-img"><img src="{{ asset('template') }}/images/faces/profile.jpg" alt="{{ $item->user->name }}"></div>
                                @endif

                                <div>
                                    <h5><a href="{{ url('/',$item->user->username ) }}">{{ $item->user->name }}</a>
                                        @guest

                                        @else
                                            {{-- <button class="reply" id="reply-btn" onclick="showReplyForm('{{ $item->id }}','{{ $item->user->name }}')"><i class="bi bi-reply-fill"></i> Reply</button> --}}
                                        @endguest
                                    </h5>
                                    <time datetime="2020-01-01">{{date('d M Y',strtotime($item->created_at)) }}</time>
                                    <p>
                                        {{ $item->comment }}.
                                    </p>
                                </div>
                            </div>


                            {{-- <div id="comment-reply-{{ $item->id }}" class="comment comment-reply">
                                <div class="d-flex">
                                    <div class="comment-img"><img src="assets/img/blog/comments-3.jpg" alt=""></div>
                                    <div>
                                        <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                        <time datetime="2020-01-01">01 Jan, 2020</time>
                                        <form action="" method="POST">
                                            <textarea id="comment-reply-{{ $item->id }}-text" name="message" cols="60" rows="2" class="form-control mb-10" placeholder="Message"></textarea>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div id="comment-reply-{{ $item->id }}" class="comment comment-reply">
                                <div class="d-flex">
                                    <div class="comment-img"><img src="assets/img/blog/comments-3.jpg" alt=""></div>
                                    <div>
                                        <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                        <time datetime="2020-01-01">01 Jan, 2020</time>
                                        <p>
                                            Ok jawaban 2.
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
                                <form action="{{ route('commentartikel.store', $artikel->id ) }}" method="POST">
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

                    </div>
                    <!-- End blog comments -->





                    {{-- <div class="blog-comments">

                        <div id="comment-2" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>
                                <div>
                                    <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                    <time datetime="2020-01-01">01 Jan, 2020</time>
                                    <p>
                                        Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                                    </p>
                                </div>
                            </div>

                            <div id="comment-reply-1" class="comment comment-reply">
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

                            </div>
                            <!-- End comment reply #1-->

                        </div>
                        <!-- End comment #2-->

                    </div>
                    <!-- End blog comments --> --}}






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

<script type="text/javascript">
    function showReplyForm(commentId,user) {
      var x = document.getElementById(`comment-reply${commentId}`);
      var input = document.getElementById(`comment-reply${commentId}-text`);

      if (x.style.display === "none") {
        x.style.display = "block";
        input.innerText=`@${user} `;

      } else {
        x.style.display = "none";
      }
    }

    </script>


@endsection


