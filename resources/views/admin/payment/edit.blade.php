@extends('layouts-admin.layaouts', ['menu' => 'store', 'submenu' => 'payment'])

@section('title', 'Edit Payment')

@section('content')

<div class="page-content">
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Payment</h4>
                        <a href="{{ route('payment.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <form action="{{ route('payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">
                                                <label for="first-name-column">Name Payement</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-list-task"></i></span>
                                                    <input type="text" id="name" name="name" class="form-control  @error('name') is-invalid @enderror"
                                                    placeholder="Name Payment" value="{{ old('name', $payment->name ) }}" required autocomplete="name">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="form-group">
                                                <label for="first-name-column">No Rekening</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-list-task"></i></span>
                                                    <input type="number" id="nomor" name="nomor" class="form-control  @error('nomor') is-invalid @enderror"
                                                    placeholder="Nomor Rekening" value="{{ old('nomor', $payment->nomor ) }}" required autocomplete="nomor">
                                                    @error('nomor')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4 col-12">
                                            <div class="form-group">
                                                <h6>Type Payment</h6>
                                                <select class="form-select" name="kategorie" id="kategorie" required>
                                                    <option disabled selected>--pilih type--</option>
                                                    <option value="0" {{ $payment->kategorie == '0' ? 'selected' : '' }}>BANK</option>
                                                    <option value="1" {{ $payment->kategorie == '1' ? 'selected' : '' }}>E-WALLET</option>
                                                </select>
                                                @error('kategorie')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-danger me-1 mb-1">Reset</button>
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
