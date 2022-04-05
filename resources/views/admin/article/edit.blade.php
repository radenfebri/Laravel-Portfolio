@extends('layouts-admin.layaouts', ['menu' => 'article', 'submenu' => 'post'])

@section('title', 'Create Article')

@section('content')

<div class="page-content">
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Article</h4>
                        <a href="{{ route('article.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <form action="{{ route('article.update', $articles->id ) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">
                                                <label for="first-name-column">Judul</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-list-task"></i></span>
                                                    <input type="text" id="judul" name="judul" class="form-control  @error('judul') is-invalid @enderror"
                                                    placeholder="Juduk Article" value="{{ old('judul', $articles->judul ) }}" required autocomplete="judul">
                                                    @error('judul')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="form-group">
                                                <h6>Categorie Article</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="kategori_id" id="kategori_id" required>
                                                        <option disabled selected>--pilih kategori--</option>
                                                        @foreach ($categories as $item)
                                                            @if ($item->id == $articles->kategori_id )
                                                                <option value="{{ $item->id }}" selected>{{ $item->nama_kategori }}</option>
                                                            @else
                                                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('kategori_id')
                                                    <div class="text-danger" mt-2 d-block>{{ $message }}</div>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="form-group">
                                                <label for="email-id-column">Gambar Artcile</label>
                                                <input class="form-control" id="gambar_artikel" name="gambar_artikel" type="file" autocomplete="gambar_artikel">
                                                <br>
                                                <label for="email-id-column">Gambar Saat ini</label>
                                                <br>
                                                @if ($articles->gambar_artikel)
                                                <div class="avatar avatar-md">
                                                    <img src="{{ asset('storage/'. $articles->gambar_artikel ) }}" style="width: 10%; height: 10%;" alt="Face 1">
                                                </div>
                                                @else
                                                <div class="avatar avatar-md">
                                                    <img src="{{ asset('template') }}/images/faces/profile.jpg" style="width: 10%; height: 10%;" alt="Face 1">
                                                </div>
                                                <p>Gambar Kosong</p>
                                                @endif
                                                @error('gambar_artikel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="form-group">
                                                <h6>Status Article</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="is_active" id="is_active" required>
                                                        <option disabled selected>--pilih status--</option>
                                                        <option value="1" {{ $articles->is_active == '1' ? 'selected' : '' }}>Publish</option>
                                                        <option value="0" {{ $articles->is_active == '0' ? 'selected' : '' }}>Draft</option>
                                                    </select>
                                                    @error('is_active')
                                                    <div class="text-danger" mt-2 d-block>{{ $message }}</div>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div class="form-group">
                                                <h6>Tanggal Publish</h6>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                                    <input type="date" id="tgl_publish" name="tgl_publish" class="form-control  @error('tgl_publish') is-invalid @enderror"
                                                    placeholder="Tgl Publish" value="{{ old('tgl_publish', date('Y-m-d', strtotime($articles->tgl_publish) ) ) }}" autocomplete="tgl_publish">
                                                    @error('tgl_publish')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div class="form-group">
                                                <label for="email-id-column">Deskripsi</label>
                                                <textarea id="summernote" class="form-control" name="deskripsi" required autocomplete="deskripsi">{{ $articles->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>

    @endsection
