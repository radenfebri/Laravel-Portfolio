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
                                    @foreach ($order as $item)
                                    <tr>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>Rp.{{ number_format($item->total_price) }}</td>
                                        <td>{{ date('d F Y, h:i:s A',strtotime($item->created_at)) }}</td>
                                        {{-- <td>{{ $item->status == '0' ? 'Unpaid' : 'Paid' }}</td> --}}
                                        <td>
                                            @if ($item->status == '0')
                                                <a href="{{ route('vieworders', $item->id ) }}" class="btn btn-danger btn-sm">Unpaid</a>
                                            @else
                                                <span class="btn btn-success btn-sm">Paid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('vieworders', $item->id ) }}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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




