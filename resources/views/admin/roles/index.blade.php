@extends('layouts-admin.layaouts', ['menu' => 'authentication'])

@section('content')

<div class="page-content">

    <!-- Input with Icons start -->
    <section id="input-with-icons">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create new Role</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            @include('admin.roles.form-control', ['submit' => 'Create'])
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Input with Icons end -->

    <section class="section">
        <div class="card">
            <div class="card-header">
                Simple Datatable
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $no => $item)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('role.edit', $item) }}" class="btn btn-sm text-warning"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('role.destroy', $item->id ) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm text-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
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
