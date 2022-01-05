@extends('layouts-admin.layaouts', ['menu' => 'article', 'submenu' => 'post'])

@section('title', 'Article')

@section('content')

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Table Article
                @can('roles.trash')
                    <a href="{{ route('article.create') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-table"></i> Data Terhapus<a>
                @endcan
                @can('')
                <a href="{{ route('article.create') }}" class="btn btn-sm text-success" style="float: right"><i class="fas fa-plus"></i><a>
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
                                <td>FOTO</td>
                                <td>Judul</td>
                                <td>{{ $item->users->name }}</td>s
                                <td>{{ $item->categories }}</td>
                                <td>
                                    @if ($item->is_active == '1')
                                        Publish
                                        @else
                                        Draft
                                    @endif
                                </td>

                                <td>
                                    <a href="" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>

                                    <form action="" onsubmit="return confirm('Yakin anda akan menghapus role {{ $item->name }}?')" method="POST" class="d-inline">
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
