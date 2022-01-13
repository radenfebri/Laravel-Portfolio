@extends('layouts-admin.layaouts', ['menu' => 'store', 'submenu' => 'order'])

@section('title', 'Orders')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            Table Orders Pending
            @can('roles.trash')
                <a href="{{ route('completed.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-table"></i> Data Completed<a>
            @endcan

            @can('roles.trash')
                {{-- <a href="" class="btn btn-sm text-success" style="float: right"><i class="fas fa-plus"></i><a> --}}
            @endcan
            </div>
            <div class="card-body">

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Order Date</th>
                            <th>Tracking Number</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $no => $item)
                        <tr>
                            <td>
                                {{ date('d F Y, h:i:s A',strtotime($item->created_at)) }}
                            </td>
                            <td>{{ $item->tracking_no }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                            <td>
                                <a href="{{ route('orders.show', $item->id ) }}" class="btn btn-sm text-info"><i class="fas fa-eye"></i></a>

                                {{-- <a href="" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a> --}}

                                <form action="" onsubmit="return confirm('Yakin anda akan menghapus article ?')" method="POST" class="d-inline">
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
