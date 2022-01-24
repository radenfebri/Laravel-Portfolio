@extends('layouts-user.layouts', ['menu' => 'akun', 'submenu' => 'myorder'])

@section('title' , "Edit Review" )

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            {{-- <ol>
                <li><a href="{{ route('store.index') }}">Store</a></li>
                <li><a href="{{ route('viewcategorie.index', $categorieproduct->slug ) }}">{{ $categorieproduct->name }}</a></li>
                <li><a href=""></a>Edit Review</li>
            </ol> --}}
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->


    <!-- ======= Portfolio Details Section ======= -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5>You are writing a review for <b>{{ $review->product->name }}</b></h5>
                            <form action="{{ url('/update-review') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="review_id" value="{{ $review->id }}">
                                <textarea class="form-control" name="user_review" id="user_review" placeholder="Write a review" cols="" rows="5">{{ $review->user_review }}</textarea>
                                <button type="submit" class="btn btn-primary mt-3">Update Review</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Details Section -->





</main>
<!-- End #main -->

@endsection




