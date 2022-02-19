@extends('layouts-admin.layaouts', ['menu' => 'article', 'submenu' => 'comment'])

@section('title', 'Comment')

@section('content')


<div class="page-content">

    <section class="section">
        <div class="card">
            <div class="card-header">
                Table Comment All Article
                </div>
                <div class="card-body">

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Comment</th>
                                <th>User</th>
                                <th>Artikel</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $no => $item)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $item->comment }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->article->judul }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ url('/blog/detail', $item->article->slug ) }}" class="btn btn-sm text-primary"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('comment.destroy', $item->id ) }}" onsubmit="return confirm('Yakin anda akan menghapus Comment : {{ $item->comment }}?')" method="POST" class="d-inline">
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
