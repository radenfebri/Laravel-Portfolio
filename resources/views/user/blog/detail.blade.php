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
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="">{{ $artikel->users->name }}</a></li>
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

                <div id="comment-1" class="comment">
                  <div class="d-flex">
                    <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                    <div>
                      <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                      <time datetime="2020-01-01">01 Jan, 2020</time>
                      <p>
                        Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                        Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                      </p>
                    </div>
                  </div>
                </div><!-- End comment #1 -->

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

                    <div id="comment-reply-2" class="comment comment-reply">
                      <div class="d-flex">
                        <div class="comment-img"><img src="assets/img/blog/comments-4.jpg" alt=""></div>
                        <div>
                          <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                          <time datetime="2020-01-01">01 Jan, 2020</time>
                          <p>
                            Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                          </p>
                        </div>
                      </div>

                    </div><!-- End comment reply #2-->

                  </div><!-- End comment reply #1-->

                </div><!-- End comment #2-->

                <div id="comment-3" class="comment">
                  <div class="d-flex">
                    <div class="comment-img"><img src="assets/img/blog/comments-5.jpg" alt=""></div>
                    <div>
                      <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                      <time datetime="2020-01-01">01 Jan, 2020</time>
                      <p>
                        Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut quam ut. Voluptatem est accusamus iste at.
                        Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio veniam. Quam officia sit nostrum dolorem.
                      </p>
                    </div>
                  </div>

                </div><!-- End comment #3 -->

                <div id="comment-4" class="comment">
                  <div class="d-flex">
                    <div class="comment-img"><img src="assets/img/blog/comments-6.jpg" alt=""></div>
                    <div>
                      <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                      <time datetime="2020-01-01">01 Jan, 2020</time>
                      <p>
                        Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore. Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.
                      </p>
                    </div>
                  </div>

                </div><!-- End comment #4 -->

                <div class="reply-form">
                  <h4>Leave a Reply</h4>
                  <p>Your email address will not be published. Required fields are marked * </p>
                  <form action="">
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input name="name" type="text" class="form-control" placeholder="Your Name*">
                      </div>
                      <div class="col-md-6 form-group">
                        <input name="email" type="text" class="form-control" placeholder="Your Email*">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col form-group">
                        <input name="website" type="text" class="form-control" placeholder="Your Website">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col form-group">
                        <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Post Comment</button>

                  </form>

                </div>

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
                    <li><a href="#">General <span>(25)</span></a></li>
                    <li><a href="#">Lifestyle <span>(12)</span></a></li>
                    <li><a href="#">Travel <span>(5)</span></a></li>
                    <li><a href="#">Design <span>(22)</span></a></li>
                    <li><a href="#">Creative <span>(8)</span></a></li>
                    <li><a href="#">Educaion <span>(14)</span></a></li>
                  </ul>
                </div><!-- End sidebar categories-->

                <h3 class="sidebar-title">Recent Posts</h3>
                <div class="sidebar-item recent-posts">
                  <div class="post-item clearfix">
                    <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                    <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                  <div class="post-item clearfix">
                    <img src="assets/img/blog/blog-recent-2.jpg" alt="">
                    <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                  <div class="post-item clearfix">
                    <img src="assets/img/blog/blog-recent-3.jpg" alt="">
                    <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                  <div class="post-item clearfix">
                    <img src="assets/img/blog/blog-recent-4.jpg" alt="">
                    <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                  <div class="post-item clearfix">
                    <img src="assets/img/blog/blog-recent-5.jpg" alt="">
                    <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                </div><!-- End sidebar recent posts-->

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


