@extends('layouts-admin.layaouts', ['menu' => 'authentication', 'submenu' => 'manajemenusers'])

@section('title', 'Trash Users')

@section('content')

<div class="page-content">

    <section class="section">
        <div class="card">
            <div class="card-header">
                Table All Users
                <div>
                    <a href="{{ route('users.delete') }}" onclick="return confirm('Apakah anda yakin akan menghapus semua data secara permanen?')" class="btn btn-sm text-danger" style="float: right"><i class="fas fa-trash"></i><a>
                </div>
                <div>
                    <a href="{{ route('users.restore') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-undo"></i><a>
                </div>
                <div>
                    <a href="{{ route('users.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>
                </div>
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
                                    <a href="{{ route('users.restore', $item->id ) }}" class="btn btn-sm text-primary"><i class="fas fa-undo-alt"></i></a>

                                    <form action="{{ route('users.delete', $item->id ) }}" onsubmit="return confirm('Yakin anda akan menghapus role {{ $item->name }} secara permanen?')" class="d-inline">
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
