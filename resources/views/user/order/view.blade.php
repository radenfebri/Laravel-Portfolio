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
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $total = 0; @endphp

                                            @foreach ($orders->orderitem as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td class="text-center">{{ $item->qty }}</td>
                                                <td>
                                                    @if ($item->products->image)
                                                        <img src="{{ asset('storage/'. $item->products->image) }}" style="width: 50px; height: 50px;" alt="{{ $item->name }}">
                                                    @else
                                                        <img src="{{ asset('template') }}/images/faces/profile.jpg"  style="width: 50px; height: 50px;" alt="{{ $item->name }}">
                                                    @endif
                                                </td>
                                                <td>{{ number_format($item->price) }}</td>
                                                <td>{{ number_format($item->price * $item->qty) }}</td>

                                            </tr>

                                            @php $total += $item->price * $item->qty; @endphp

                                            @endforeach
                                        </tbody>
                                    </table>
                                    <b>Information :</b><p>3 Digit angka dibelakang adalah kode unik.</p>
                                    <h4><b>Grand Total : </b><span class="float-end">Rp. {{ number_format($orders->total_price) }}</span> </h4>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <h4><strong>Bank Transfer</strong></h4>
                                    <p>Gunakan Bank Transfer untuk transaksi</p>
                                    <hr>
                                    @foreach ($payment_bank as $item)
                                        <label for="name"><strong>{{ $item->name }}</strong></label>
                                        <div class="border p-2 mb-2">{{ $item->nomor }}</div>
                                    @endforeach
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <h4><strong>E-Wallet</strong></h4>
                                    <p>Gunakan E-Wallet  untuk transaksi</p>
                                    <hr>
                                    @foreach ($payment_ewallet as $item)
                                        <label for="name"><strong>{{ $item->name }}</strong></label>
                                        <div class="border p-2 mb-2">{{ $item->nomor }}</div>
                                    @endforeach
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




