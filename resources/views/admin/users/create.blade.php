@extends('layouts-admin.layaouts', ['menu' => 'authentication', 'submenu' => 'manajemenusers'])

@section('title', 'Create User')

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
                    <form method="POST" action="{{ route('users.store') }}" class="form form-horizontal">
                        @csrf
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
                                            placeholder="Name" value="{{ old('name') }}" autocomplete="name" required>
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
                                            placeholder="Email" value="{{ old('email') }}" autocomplete="email" required>
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
                                    <label>Password</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                                            placeholder="Password" value="{{ old('password') }}" autocomplete="new-password" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Confirm Password</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="password_confirmation" id="password-confirm"
                                            placeholder="Password Confirmation" autocomplete="new-password" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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





