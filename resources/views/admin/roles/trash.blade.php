@extends('layouts-admin.layaouts', ['menu' => 'authentication'])

@section('content')

<div class="page-content">


    <section class="section">
        <div class="card">
            <div class="card-header">
                Table Data Role Terhapus
                <a href="{{ route('trash') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-table"></i> Data Terhapus<a>
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
                                {{-- <td>
                                    <a href="{{ route('role.edit', $item) }}" class="btn btn-sm text-warning"><i class="fas fa-edit"></i></a>

                                    <form action="{{ route('role.destroy', $item->id ) }}" onsubmit="return confirm('Yakin anda akan menghapus role {{ $item->name }}?')" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm text-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>



    @endsection
