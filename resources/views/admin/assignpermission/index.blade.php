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
                                <form action="{{ route('assignpermission.index') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <h6>Select Role</h6>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="role" id="role" required>
                                                <option disabled selected>--pilih role--</option>
                                                @foreach ($roles as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                            <select class="choices form-select multiple-remove" multiple="multiple" name="permissions[]" id="permissions" required>
                                                <optgroup label="--pilih permission--">
                                                    @foreach ($permissions as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @error('permissions')
                                                <div class="text-danger" mt-2 d-block>{{ $message }}</div>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-outline-success btn-sm mt-4">Assign</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Table Assign Permission to Role
                </div>
                <div class="card-body">

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $no => $item)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ implode(', ', $item->getPermissionNames()->toArray() ) }}</td>
                                <td>
                                    <a href="{{ route('assignpermission.edit', $item ) }}" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>



    @endsection
