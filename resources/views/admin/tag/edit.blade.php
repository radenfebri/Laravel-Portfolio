@extends('layouts-admin.layaouts', ['menu' => 'article', 'submenu' => 'catgeorie'])

@section('title', 'Update Tag')

@section('content')

<div class="page-content">

    <!-- Input with Icons start -->
    <section id="input-with-icons">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Tag <strong>{{ $tags->nama_tag }}</strong></h4>
                        <div>
                            @can('')
                            <a href="{{ route('tag.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>
                                @endcan
                        </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('tag.update', $tags->id ) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="sm-6">
                                        <h6>Tag Name</h6>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control @error('nama_tag') is-invalid @enderror" name="nama_tag" id="nama_tag" placeholder="Tag Name"
                                            value="{{ old('nama_tag') ?? $tags->nama_tag }}" autocomplete="nama_tag" autofocus>
                                            @error('nama_tag')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="bi bi-bookmark"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button id="top-center" class="btn btn-outline-success btn-sm">Submit</button>
                                    </div>

                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Input with Icons end -->


        @endsection
