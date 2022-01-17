@extends('layouts-user.layouts', ['menu' => 'akun', 'submenu' => 'myorder'])

@section('title' , "My Orders" )

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('store.index') }}">Store</a></li>
                <li><a href="{{ route('myorder.index') }}">My Orders</a></li>
                <li><a href=""></a>Detail Orders</li>
            </ol>
            <h2>@yield('title') Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->


    <!-- ======= Portfolio Details Section ======= -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <h4 class="text-white">Order View
                            <a href="{{ route('myorder.index') }}" class="text-white float-end btn btn-outline-white"><i class="fas fa-backward"></i></a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Shipping Detail</h4>
                                    <hr>
                                    <label for="">Name</label>
                                    <div class="border p-2 mb-2">{{ $order->name }}</div>
                                    <label class="mt-2" for="">Email</label>
                                    <div class="border p-2 mb-2">{{ $order->email }}</div>
                                    <label class="mt-2" for="">Alamat</label>
                                    <div class="border p-2">{{ $order->alamat }}</div>
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
                                            @foreach ($order->orderitem as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>
                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/.' , $item->image) }}" style="width: 50px; height: 50px;" alt="{{ $item->name }}">
                                                    @else
                                                        <img src="{{ asset('template') }}/images/faces/profile.jpg"  style="width: 50px; height: 50px;" alt="{{ $item->name }}">
                                                    @endif
                                                </td>
                                                <td>{{ number_format($item->price) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <b>Information :</b><p>3 Digit angka dibelakang adalah kode unik.</p>
                                    <h4 class="px-2">Grand Total : <span class="float-end">Rp. {{ number_format($order->total_price) }}</span> </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
asdasdasdasd
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Details Section -->





</main>
<!-- End #main -->

@endsection




