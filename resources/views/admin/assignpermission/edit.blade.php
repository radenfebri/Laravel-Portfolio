@extends('layouts-admin.layaouts', ['menu' => 'authentication'])

@section('content')

<div class="page-content">

    <section class="bootstrap-select">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Assign Permission to Role</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <h6>Select Role</h6>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="role" id="role">
                                                <option disabled selected>--pilih role--</option>
                                                @foreach ($roles as $item)
                                                <option {{ $role->id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                            <div class="text-danger" mt-2 d-block>{{ $message }}</div>
                                            @enderror
                                        </fieldset>
                                    </div>

                                    <div class="form-group mt-4">
                                        <h6>Select Permission</h6>
                                        <div class="form-group">
                                            <select class="choices form-select multiple-remove" multiple="multiple" name="permissions[]" id="permissions">
                                                <optgroup label="--pilih permission--">
                                                    @foreach ($permissions as $item)
                                                    <option {{ $role->permissions()->find($item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
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
