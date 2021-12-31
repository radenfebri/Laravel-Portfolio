@extends('layouts-admin.layaouts', ['menu' => 'authentication', 'submenu' => 'role'])

@section('title', 'Trash Roles')

@section('content')

<div class="page-content">


    <section class="section">
        <div class="card">
            <div class="card-header">
                Table Data Role Terhapus
                <div class="btn-group" style="float: right">
                    <div class="bnt-group dropdown mb-1">
                        <a href="{{ route('role.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>
                    </div>
                    <div>
                        <a href="{{ route('role.restore') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-undo"></i><a>
                    </div>
                    <div>
                        <a href="{{ route('role.delete') }}" onclick="return confirm('Apakah anda yakin akan menghapus semua data secara permanen?')" class="btn btn-sm text-danger" style="float: right"><i class="fas fa-trash"></i><a>
                    </div>
                </div>
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
                                <a href="{{ route('role.restore', $item->id ) }}" class="btn btn-sm text-primary"><i class="fas fa-undo-alt"></i></a>

                                <form action="{{ route('role.delete', $item->id ) }}" onsubmit="return confirm('Yakin anda akan menghapus role {{ $item->name }} secara permanen?')" class="d-inline">
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
