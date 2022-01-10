@extends('layouts-admin.layaouts', ['menu' => 'store', 'submenu' => 'product'])

@section('title', 'Create Product')

@section('content')

<div class="page-content">

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Product</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Name</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" id="alamat" name="name" class="form-control  @error('name') is-invalid @enderror"
                                                placeholder="name" value="{{ old('name') }}" autocomplete="name">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Categorie Product</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                                <select class="form-select" name="categorie_id" id="categorie_id" required>
                                                    <option disabled selected>--pilih kategori--</option>
                                                    @foreach ($categorieproduct as $item)
                                                    @if (old('kategori_id') == $item->id )
                                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                                    @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('kategori_id')
                                                <div class="text-danger" mt-2 d-block>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Small Description</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                                <textarea type="text" id="small_description" name="small_description" class="form-control  @error('small_description') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('small_description') }}" autocomplete="small_description"></textarea>
                                                @error('small_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Description</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                                <textarea type="text" id="description" name="description" class="form-control  @error('description') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('description') }}" autocomplete="description"></textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Original Price</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                                <input type="number" id="original_price" name="original_price" class="form-control  @error('original_price') is-invalid @enderror"
                                                placeholder="original_price" value="{{ old('original_price') }}" aria-label="original_price" aria-describedby="basic-addon1">
                                                @error('original_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Selling Price</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-briefcase-fill"></i></span>
                                                <input type="number" id="selling_price" name="selling_price" class="form-control  @error('selling_price') is-invalid @enderror"
                                                placeholder="Job Title" value="{{ old('selling_price') }}" aria-label="selling_price" aria-describedby="basic-addon1">
                                                @error('selling_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Tax</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                                <input type="number" id="tax" name="tax" class="form-control  @error('tax') is-invalid @enderror"
                                                placeholder="tax Job Title" value="{{ old('tax', Auth::user()->tax ) }}" aria-label="tax" aria-describedby="basic-addon1">
                                                @error('tax')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Quantity</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">http://</i></span>
                                                <input type="number" id="qty" name="qty" class="form-control  @error('qty') is-invalid @enderror"
                                                placeholder="radenfebri.com" value="{{ old('qty' ) }}" aria-label="qty" aria-describedby="basic-addon1">
                                                @error('qty')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Status</label>
                                            <div class="input-group mb-3">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="status" id="status" class="form-check-input" >
                                                    <label for="checkbox1">Status</label>
                                                </div>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Trending</label>
                                            <div class="input-group mb-3">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="trending" id="trending" class="form-check-input" >
                                                    <label for="checkbox1">Trending</label>
                                                </div>
                                                @error('trending')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Meta Title</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                <textarea type="text" id="meta_title" name="meta_title" class="form-control  @error('meta_title') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('meta_title' ) }}" aria-label="meta_title" aria-describedby="basic-addon1"></textarea>
                                                @error('meta_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Meta Keywords</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                <textarea type="text" id="meta_keywords" name="meta_keywords" class="form-control  @error('meta_keywords') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('meta_keywords' ) }}" aria-label="meta_keywords" aria-describedby="basic-addon1"></textarea>
                                                @error('meta_keywords')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Meta Description</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                <textarea type="text" id="meta_description" name="meta_description" class="form-control  @error('meta_description') is-invalid @enderror"
                                                placeholder="radenfebri" value="{{ old('meta_description' ) }}" aria-label="meta_description" aria-describedby="basic-addon1"></textarea>
                                                @error('meta_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-4">
                                        <div class="form-group">
                                            <label for="email-id-column">Gambar Product</label>
                                            <input class="form-control" id="image" name="image" type="file">
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-danger me-1 mb-1">Reset</button>
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





