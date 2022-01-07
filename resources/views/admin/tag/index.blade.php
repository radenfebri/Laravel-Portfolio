@extends('layouts-admin.layaouts', ['menu' => 'article', 'submenu' => 'tag'])

@section('title', 'Tag')

@section('content')


<div class="page-content">

    <section class="section">
        <div class="card">
            <div class="card-header">
                Table Tag Article
                @can('')
                <a href="{{ route('tag.create') }}" class="btn btn-sm text-success" style="float: right"><i class="fas fa-plus"></i><a>
                    @endcan
                </div>
                <div class="card-body">

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Tag</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $no => $item)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $item->nama_tag }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <a href="{{ route('tag.edit', $item->id ) }}" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('tag.destroy', $item->id ) }}" onsubmit="return confirm('Yakin anda akan menghapus categorie {{ $item->nama_kategori }}?')" method="POST" class="d-inline">
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
