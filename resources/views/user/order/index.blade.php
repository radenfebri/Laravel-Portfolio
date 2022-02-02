@extends('layouts-user.layouts', ['menu' => 'akun', 'submenu' => 'myorder'])

@section('title' , "My Orders" )

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('store.index') }}">Store</a></li>
                <li><a href=""></a>My Orders</li>
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
                    @if ($orders->count() > 0)

                    <div class="card shadow">
                        <div class="card-header">
                            <h4><strong>My Orders</strong></h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tracking Number</th>
                                        <th>Total Price</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>Rp.{{ number_format($item->total_price) }}</td>
                                        <td>{{ date('d F Y',strtotime($item->created_at)) }}</td>
                                        <td>
                                            @if ($item->status == '0')
                                                <span class="btn btn-danger btn-sm">Unpaid</span>
                                            @else
                                                <span class="btn btn-success btn-sm">Paid</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == '0')
                                                <a href="{{ route('vieworders', $item->id ) }}" class="btn btn-primary"><i class="bi bi-info-circle-fill"></i></a>
                                                <a href="https://wa.me/6285156000254?text=Hallo+kak+*Raden+Febri*,+Saya+mau+Konfirmasi+sudah+melakukan+pembayaran+dengan+data+berikut%3A%0A
                                                    %0ANama+%3A+*{{ Auth::user()->name }}*
                                                    %0ANo.Tracking+%3A+*{{ $item->tracking_no }}*
                                                    %0ASudah+membayar+%3A+*Rp.{{ number_format($item->total_price) }}*
                                                    %0ATanggal+%3A+*{{ date('d F Y h:i:s',strtotime($item->created_at)) }}*
                                                    %0AAlamat+%3A+*{{ Auth::user()->alamat }}*
                                                    %0A%0A+Tolong+segera+diproses+ya+kak."
                                                    class="btn btn-success"><i class="bi bi-whatsapp"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('vieworders', $item->id ) }}" class="btn btn-primary"><i class="bi bi-info-circle-fill"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @else

                    <div class="card shadow">
                        <div class="card-body text-center">
                            <h2>Your <i class="bi bi-receipt"></i> Orders is Empty</h2>
                        </div>
                    </div>

                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Details Section -->


</main>
<!-- End #main -->

@endsection




