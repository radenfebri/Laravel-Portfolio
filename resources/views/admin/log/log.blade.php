@extends('layouts-admin.layaouts', ['menu' => 'log'])

@section('content')

<div class="page-content">
    <!-- Input with Icons start -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Laravel 8: Authentication Log</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">IP Address</th>
                                {{-- <th scope="col">Location</th> --}}
                                <th scope="col">Login at</th>
                                <th scope="col">Login Successfully</th>
                                <th scope="col">Logout at</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $key => $item)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $item['ip_address'] }}</td>
                                    {{-- <td>{{ $item->location['city'] }}</td> --}}
                                    <td>{{ Carbon\Carbon::parse($item['login_at'])->isoFormat('D MMMM YYYY h:mm A') }}</td>
                                    <td>{{ $item['login_successful']  === true ? 'Yes' : 'No' }}</td>
                                    <td>{{ $item['logout_at'] === NULL ? '-' : Carbon\Carbon::parse($item->logout_at)->isoFormat('D MMMM YYYY h:mm A') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Input with Icons end -->
</div>




@endsection
