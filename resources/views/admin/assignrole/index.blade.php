@extends('layouts-admin.layaouts', ['menu' => 'authentication'])

@section('content')

<div class="page-content">

    <section class="bootstrap-select">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Assign Role to User</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <form action="{{ route('assignrole.index') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <h6>Select Email</h6>
                                        <div class="form-group">
                                            <select class="choices form-select" required>
                                                <option disabled selected>--pilih email--</option>
                                                @foreach ($usersall as $item)
                                                <option value="{{ $item->id }}">{{ $item->email }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mt-4">
                                            <h6>Select Role</h6>
                                            <div class="form-group">
                                                <select class="choices form-select multiple-remove" multiple="multiple" name="roles[]" id="roles" required>
                                                    <optgroup label="--pilih permission--">
                                                        @foreach ($roles as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </optgroup>
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
                    Table Assign Role to User
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
                            @foreach ($users as $no => $item)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ implode(', ', $item->getRoleNames()->toArray() ) }}</td>
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
