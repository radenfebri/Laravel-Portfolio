@extends('layouts-admin.layaouts', ['menu' => 'article', 'submenu' => 'categorie'])

@section('title', 'Categorie')

@section('content')


<div class="page-content">

    <section class="section">
        <div class="card">
            <div class="card-header">
                Table Kategori Article
                @can('')
                <a href="{{ route('categorie.create') }}" class="btn btn-sm text-success" style="float: right"><i class="fas fa-plus"></i><a>
                    @endcan
                </div>
                <div class="card-body">

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $no => $item)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <a href="{{ route('categorie.edit', $item->id ) }}" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>
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
