@extends('layouts-admin.layaouts', ['menu' => 'article', 'submenu' => 'catgeorie'])

@section('title', 'Update Categorie')

@section('content')

<div class="page-content">

    <!-- Input with Icons start -->
    <section id="input-with-icons">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Categorie <strong>{{ $categories->nama_kategori }}</strong></h4>
                        <div>
                            @can('')
                            <a href="{{ route('categorie.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>
                                @endcan
                        </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('categorie.update', $categories->id ) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="sm-6">
                                        <h6>Categorie Name</h6>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" id="nama_kategori" placeholder="Categorie Name"
                                            value="{{ old('nama_kategori') ?? $categories->nama_kategori }}" autocomplete="nama_kategori" autofocus>
                                            @error('nama_kategori')
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
