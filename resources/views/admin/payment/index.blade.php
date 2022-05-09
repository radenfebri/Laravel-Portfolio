@extends('layouts-admin.layaouts', ['menu' => 'store', 'submenu' => 'payment'])

@section('title', 'Setting Payment')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            Table Payment Banks & E-Wallet

                <a href="{{ route('payment.create') }}" class="btn btn-sm text-success" style="float: right"><i class="fas fa-plus"></i><a>
            </div>
            <div class="card-body">

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Rekening</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payment as $no => $item)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->nomor  }}</td>
                            <td>
                                @if ($item->kategorie == 0)
                                    BANK
                                @else
                                    E-WALLET
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('payment.edit', $item->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('payment.destroy', $item->id ) }}" onsubmit="return confirm('Yakin anda akan menghapus categorie {{ $item->name }}?')" method="POST" class="d-inline">
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
