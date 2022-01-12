@extends('layouts-admin.layaouts', ['menu' => 'store', 'submenu' => 'product'])

@section('title', 'Update Product')

@section('content')

<div class="page-content">

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Product</h4>
                        <a href="{{ route('product.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form action="{{ route('product.update', $product->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Product Name</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-bag"></i></span>
                                                <input type="text" id="alamat" name="name" class="form-control  @error('name') is-invalid @enderror"
                                                placeholder="Product Name" value="{{ old('name', $product->name ) }}" autocomplete="name">
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
                                                <span class="input-group-text"><i class="bi bi-basket"></i></span>
                                                <select class="form-select" name="categorie_id" id="categorie_id" required>
                                                    <option disabled selected>--pilih kategori--</option>
                                                    @foreach ($categorieproduct as $item)
                                                    @if ($item->id == $product->categorie_id )
                                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                                    @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('categorie_id')
                                                <div class="text-danger" mt-2 d-block>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="first-name-column">Small Description</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-clipboard-data"></i></span>
                                                <textarea type="text" id="small_description" name="small_description" class="form-control  @error('small_description') is-invalid @enderror"
                                                placeholder="Small Description" value="{{ old('small_description') }}" autocomplete="small_description">{{ $product->small_description }}</textarea>
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
                                                <span class="input-group-text"><i class="bi bi-clipboard-data"></i></span>
                                                <textarea type="text" id="description" name="description" class="form-control  @error('description') is-invalid @enderror"
                                                placeholder="Description" value="{{ old('description' ) }}" autocomplete="description">{{  $product->description }}</textarea>
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
                                                <span class="input-group-text">Rp.</span>
                                                <input type="number" id="original_price" name="original_price" class="form-control  @error('original_price') is-invalid @enderror"
                                                placeholder="20.000" value="{{ old('original_price', $product->original_price ) }}" aria-label="original_price" aria-describedby="basic-addon1">
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
                                                <span class="input-group-text">Rp.</span>
                                                <input type="number" id="selling_price" name="selling_price" class="form-control  @error('selling_price') is-invalid @enderror"
                                                placeholder="10.000" value="{{ old('selling_price', $product->selling_price ) }}" aria-label="selling_price" aria-describedby="basic-addon1">
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
                                                <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                                <input type="number" id="tax" name="tax" class="form-control  @error('tax') is-invalid @enderror"
                                                placeholder="Tax Job Title" value="{{ old('tax',$product->tax ) }}" aria-label="tax" aria-describedby="basic-addon1">
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
                                                <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                                <input type="number" id="qty" name="qty" class="form-control  @error('qty') is-invalid @enderror"
                                                placeholder="Quantity" value="{{ old('qty', $product->qty ) }}" aria-label="qty" aria-describedby="basic-addon1">
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
                                                    <input type="checkbox" name="status" id="status" class="form-check-input" {{ $product->status == "1" ? 'checked':'' }} >
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
                                                    <input type="checkbox" name="trending" id="trending" class="form-check-input" {{ $product->trending == "1" ? 'checked':'' }} >
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
                                                <span class="input-group-text"><i class="bi bi-clipboard-data"></i></span>
                                                <textarea type="text" id="meta_title" name="meta_title" class="form-control  @error('meta_title') is-invalid @enderror"
                                                placeholder="Meta Title" value="{{ old('meta_title' ) }}" aria-label="meta_title" aria-describedby="basic-addon1">{{  $product->meta_title }}</textarea>
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
                                                <span class="input-group-text"><i class="bi bi-clipboard-data"></i></span>
                                                <textarea type="text" id="meta_keywords" name="meta_keywords" class="form-control  @error('meta_keywords') is-invalid @enderror"
                                                placeholder="Meta Keywords" value="{{ old('meta_keywords' ) }}" aria-label="meta_keywords" aria-describedby="basic-addon1">{{ $product->meta_keywords }}</textarea>
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
                                                <span class="input-group-text"><i class="bi bi-clipboard-data"></i></span>
                                                <textarea type="text" id="meta_description" name="meta_description" class="form-control  @error('meta_description') is-invalid @enderror"
                                                placeholder="Meta Description" value="{{ old('meta_description') }}" aria-label="meta_description" aria-describedby="basic-addon1">{{ $product->meta_description }}</textarea>
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
                                            <br>
                                            <label for="email-id-column">Gambar Saat ini</label>
                                            <br>
                                            @if ($product->image)
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('storage/'. $product->image ) }}" style="width: 10%; height: 10%;" alt="Face 1">
                                            </div>
                                            @else
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('template') }}/images/faces/profile.jpg" style="width: 10%; height: 10%;" alt="Face 1">
                                            </div>
                                            <p>Gambar Kosong</p>
                                            @endif
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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





