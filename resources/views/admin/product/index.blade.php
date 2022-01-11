@extends('layouts-admin.layaouts', ['menu' => 'store', 'submenu' => 'product'])

@section('title', 'Product')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            Table Product
                <a href="" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-table"></i> Data Terhapus<a>

                <a href="{{ route('product.create') }}" class="btn btn-sm text-success" style="float: right"><i class="fas fa-plus"></i><a>
            </div>
            <div class="card-body">

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Categorie</th>
                            <th>Selling Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $no => $item)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->categorieproduct->name }}</td>
                            <td>{{ $item->selling_price }}</td>
                            <td>{!! \Illuminate\Support\Str::words($item->description, 5,'....') !!}</td>
                            <td>
                                @if ($item->image)
                                <div class="avatar avatar-lg">
                                    <img src="{{ asset('storage/'. $item->image ) }}" alt="{{ $item->image }}">
                                </div>
                                @else
                                <div class="avatar avatar-lg">
                                    <img src="{{ asset('template') }}/images/faces/profile.jpg" alt="{{ $item->image }}">
                                </div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('product.edit', $item->id ) }}" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('product.destroy', $item->id ) }}" onsubmit="return confirm('Yakin anda akan menghapus categorie {{ $item->name }}?')" method="POST" class="d-inline">
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
