@extends('layouts-user.layouts', ['menu' => 'akun', 'submenu' => 'myprofile'])

@section('title' , "$username->name - Raden Febri")

@section('content')

<main id="main">


    <section id="hero" class="hero d-flex align-items-center">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-6">
                    @if ($username->foto)
                    <img src="{{ ('storage/'. $username->foto ) }}" style="width: 400px; height: 400px; border-radius: 50%;" class="shadow img-fluid" alt="{{ $username->name }}">
                    @else
                    <img src="{{ asset('template') }}/images/faces/profile.jpg" style="width: 400px; height: 400px; border-radius: 50%;" class="shadow img-fluid alt="{{ $username->name }}">
                    @endif

                </div>

                <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                    <div class="row align-self-center gy-4">
                        <h1>{{ $username->name }}</h1>
                        <br>
                        <strong>Joined {{ date('d M Y',strtotime($username->created_at)) }}</strong>

                        @if ($username->jobtitle)
                        <strong>{{ $username->jobtitle }} at {{ $username->at }}</strong>
                        @else
                        <strong>{{ $username->at }}</strong>
                        @endif

                        @if ($username->facebook)
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <a href="http://facebook.com/{{ $username->facebook }}" style="color: #3b5998"><h3><i class="bi bi-facebook"></i> Facebook</h3></a>
                            </div>
                        </div>
                        @else

                        @endif

                        @if ($username->twitter)
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                            <div class="feature-box d-flex align-items-center">
                                <a href="http://twitter.com/{{ $username->twitter }}" style="color: #1da1f2"><h3><i class="bi bi-twitter"></i> Twitter</h3></a>
                            </div>
                        </div>
                        @else

                        @endif

                        @if ($username->instagram)
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                            <div class="feature-box d-flex align-items-center">
                                <a href="http://instagram.com/{{ $username->instagram }}" style="color: #4c5fd7"><h3><i class="bi bi-instagram"></i> Instagram</h3></a>
                            </div>
                        </div>
                        @else

                        @endif

                        @if ($username->website)
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                            <div class="feature-box d-flex align-items-center">
                                <a href="http://{{ $username->website }}"><h3><i class="bi bi-globe"></i> Website</h3></a>
                            </div>
                        </div>
                        @else

                        @endif

                        @if ($username->github)
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                            <div class="feature-box d-flex align-items-center">
                                <a href="http://github.com/{{ $username->github }}" style="color: black"><h3><i class="bi bi-github"></i> Github</h3></a>
                            </div>
                        </div>
                        @else

                        @endif

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                            <div class="feature-box d-flex align-items-center my-auto">
                                {{-- <a href=""><h3><i class="bi bi-share-fill"></i> Share</h3></a> --}}
                                <a class="sharethis-inline-share-buttons"></a>&nbsp;<h3 style="color: greenyellow">Share</h3>
                            </div>
                        </div>

                        @if ($username->about)
                        <p><strong>About me : </strong>{{ $username->about }}</p>
                        @else

                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>


</main>
<!-- End #main -->

@endsection


