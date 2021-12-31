@extends('layouts-admin.layaouts', ['menu' => 'authentication', 'submenu' => 'manajemenusers'])

@section('title', 'Update User')

@section('content')

<div class="page-content">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Create New User</h4>
                <a href="{{ route('users.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>

            </div>
            <div class="card-content">
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id ) }}" class="form form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                @csrf
                                <div class="col-md-4">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                            placeholder="Name" value="{{ old('name', $user->name ) }}" autocomplete="name" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                            placeholder="Email" value="{{ old('email', $user->email) }}" autocomplete="email" readonly required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Foto</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input class="form-control form-control-sm" id="foto" name="foto" type="file">
                                            <div class="form-control-icon">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>


@endsection





