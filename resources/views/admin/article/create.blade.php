@extends('layouts-admin.layaouts', ['menu' => 'authentication', 'submenu' => 'role'])

@section('title', 'Create Article')

@section('content')

<div class="page-content">
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Article</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Name</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" id="alamat" name="name" class="form-control  @error('name') is-invalid @enderror"
                                                placeholder="name" value="{{ old('name', Auth::user()->name ) }}" autocomplete="name">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Username</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                                <input type="text" id="username" name="username" class="form-control  @error('username') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('username', Auth::user()->username ) }}" autocomplete="username">
                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Email</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                                <input type="text" id="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('email', Auth::user()->email ) }}" autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Alamat</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                                <input type="text" id="alamat" name="alamat" class="form-control  @error('alamat') is-invalid @enderror"
                                                placeholder="Alamat" value="{{ old('alamat', Auth::user()->alamat ) }}" aria-label="alamat" aria-describedby="basic-addon1">
                                                @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Job Title</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-briefcase-fill"></i></span>
                                                <input type="text" id="jobtitle" name="jobtitle" class="form-control  @error('jobtitle') is-invalid @enderror"
                                                placeholder="Job Title" value="{{ old('jobtitle', Auth::user()->jobtitle ) }}" aria-label="jobtitle" aria-describedby="basic-addon1">
                                                @error('jobtitle')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">At</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                                <input type="text" id="at" name="at" class="form-control  @error('at') is-invalid @enderror"
                                                placeholder="At Job Title" value="{{ old('at', Auth::user()->at ) }}" aria-label="at" aria-describedby="basic-addon1">
                                                @error('at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Website</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">http://</i></span>
                                                <input type="text" id="website" name="website" class="form-control  @error('website') is-invalid @enderror"
                                                placeholder="radenfebri.com" value="{{ old('website', Auth::user()->website ) }}" aria-label="website" aria-describedby="basic-addon1">
                                                @error('website')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">GitHub</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-github"></i></span>
                                                <input type="text" id="github" name="github" class="form-control  @error('github') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('github', Auth::user()->github ) }}" aria-label="github" aria-describedby="basic-addon1">
                                                @error('github')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Twitter</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                                <input type="text" id="twitter" name="twitter" class="form-control  @error('twitter') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('twitter', Auth::user()->twitter ) }}" aria-label="twitter" aria-describedby="basic-addon1">
                                                @error('twitter')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Instagram</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                <input type="text" id="instagram" name="instagram" class="form-control  @error('instagram') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('instagram', Auth::user()->instagram ) }}" aria-label="instagram" aria-describedby="basic-addon1">
                                                @error('instagram')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Facebook</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                <input type="text" id="facebook" name="facebook" class="form-control  @error('facebook') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('facebook', Auth::user()->facebook ) }}" aria-label="facebook" aria-describedby="basic-addon1">
                                                @error('facebook')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="email-id-column">Foto</label>
                                            <input class="form-control" id="foto" name="foto" type="file">
                                            @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-floating">
                                        <div class="form-group">
                                            <div class="card-header">
                                                <h4 class="card-title">Default Editor</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="summernote"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>

@endsection
