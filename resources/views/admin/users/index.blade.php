@extends('layouts-admin.layaouts', ['menu' => 'authentication'])

@section('content')

<div class="page-content">

    <section class="section">
        <div class="card">
            <div class="card-header">
                Table All Users
                    <a href="" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-table"></i> Data Terhapus<a>
                    <a href="{{ route('users.create') }}" class="btn btn-sm text-success" style="float: right"><i class="fas fa-plus"></i><a>
                </div>
                <div class="card-body">

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>
                                    @if ($item->foto)
                                        <div class="avatar avatar-md">
                                            <img src="{{ asset('storage/'. $item->foto ) }}" alt="Face 1">
                                        </div>
                                    @else
                                        <div class="avatar avatar-md">
                                            <img src="{{ asset('template') }}/images/faces/profile.jpg" alt="Face 1">
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $item ) }}" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('editpassword', $item ) }}" class="btn btn-sm text-warning"><i class="fas fa-key"></i></a>

                                    <form action="" onsubmit="return confirm('Yakin anda akan menghapus permission {{ $item->name }}?')" method="POST" class="d-inline">
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
