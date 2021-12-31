@extends('layouts-admin.layaouts', ['menu' => 'authentication', 'submenu' => 'assignrole'])

@section('title', 'Update Assign Role')

@section('content')

<div class="page-content">

    <section class="bootstrap-select">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Assign Permission to Role</h4>
                        <a href="{{ route('assignrole.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control " placeholder="Permission Name" value=" {{ $user->email }}" autocomplete="name" readonly autofocus required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <h6>Select Permission</h6>
                                        <div class="form-group">
                                            <select class="choices form-select multiple-remove" multiple="multiple" name="permissions[]" id="permissions">
                                                <optgroup label="--pilih permission--">
                                                    @foreach ($roles as $item)
                                                        <option {{ $user->roles()->find($item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-outline-success btn-sm mt-4">Sync</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @endsection
