@extends('layouts-admin.layaouts', ['menu' => 'store', 'submenu' => 'order'])

@section('title', 'Show Order')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Order View
                            <a href="{{ route('orders.index') }}" class="text-white float-end btn btn-outline-white"><i class="fas fa-backward"></i></a>
                        </h4>
                    </div>
                    <div class="card-body mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Shipping Detail</h4>
                                <hr>
                                <label for="">Name</label>
                                <div class="border p-2 mb-2">{{ $orders->name }}</div>
                                <label class="mt-2" for="">Email</label>
                                <div class="border p-2 mb-2">{{ $orders->email }}</div>
                                <label class="mt-2" for="">Alamat</label>
                                <div class="border p-2">{{ $orders->alamat }}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Detail</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitem as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>
                                                @if ($item->products->image)
                                                <img src="{{ asset('storage/'. $item->products->image) }}" style="width: 50px; height: 50px;" alt="{{ $item->name }}">
                                                @else
                                                <img src="{{ asset('template') }}/images/faces/profile.jpg"  style="width: 50px; height: 50px;" alt="{{ $item->name }}">
                                                @endif
                                            </td>
                                            <td>{{ number_format($item->price) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Grand Total : <span class="float-end">Rp. {{ number_format($orders->total_price) }}</span> </h4>

                                <div class="mt-5 px-2">
                                    <label for="">Status Order</label>
                                    <form action="{{ route('orders.update', $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status" id="order_status" required>
                                            <option disabled selected>--pilih status--</option>
                                            <option value="0" {{ $orders->status == '0' ? 'selected' : '' }}>Pending</option>
                                            <option value="1" {{ $orders->status == '1' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
