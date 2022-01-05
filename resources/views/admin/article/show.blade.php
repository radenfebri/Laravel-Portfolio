@extends('layouts-admin.layaouts', ['menu' => 'article', 'submenu' => 'post'])

@section('title', 'Show Article')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            Show Article
            @can('roles.trash')
                <a href="{{ route('article.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>
            @endcan

            </div>
            <div class="card-body">
                <div>
                <h2>{{ $articles->judul }}</h2><strong>{{ $articles->categories->nama_kategori }}</strong> By.<strong>{{ $articles->users->name }}</strong>
                </div>
                <div>
                    @if ($articles->gambar_artikel)
                        <img src="{{ asset('storage/'. $articles->gambar_artikel ) }}" style="height: 30%", width="30%" alt="Face 1">
                    @else
                        <img src="{{ asset('template') }}/images/faces/profile.jpg" style="height: 30%", width="30%" alt="Face 1">
                    @endif
                </div>
                <div class="mt-4">
                    {!! $articles->deskripsi !!}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
