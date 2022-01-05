@extends('layouts-admin.layaouts', ['menu' => 'article', 'submenu' => 'post'])

@section('title', 'Article')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            Table Role
            @can('roles.trash')
            <a href="{{ route('role.trash') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-table"></i> Data Terhapus<a>
                @endcan
            </div>
            <div class="card-body">

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Author</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $no => $item)
                        <tr>
                            <td>
                                @if ($item->gambar_artikel)
                                <div class="avatar avatar-md">
                                    <img src="{{ asset('storage/'. $item->gambar_artikel ) }}" alt="Face 1">
                                </div>
                                @else
                                <div class="avatar avatar-md">
                                    <img src="{{ asset('template') }}/images/faces/profile.jpg" alt="Face 1">
                                </div>
                                @endif
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->users->name }}</td>
                            <td>{{ $item->categories->nama_kategori }}</td>
                            <td>
                                @if ($item->is_active == '1')
                                Publish
                                @else
                                Draft
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('role.edit', $item ) }}" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('role.destroy', $item->id ) }}" onsubmit="return confirm('Yakin anda akan menghapus role {{ $item->name }}?')" method="POST" class="d-inline">
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
