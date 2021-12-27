@extends('layouts-admin.layaouts', ['menu' => 'authentication'])

@section('content')

<div class="page-content">
    <!-- Input with Icons start -->
    <section id="input-with-icons">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create new Role</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>Role Name</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" placeholder="Role Name">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h6>Guard Name</h6>
                                <div class="form-group position-relative has-icon-right">
                                    <input type="text" class="form-control" placeholder="Default Web" readonly>
                                    <div class="form-control-icon">
                                        <i class="bi bi-bookmarks"></i>
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="col-12 col-md-4">
                                <button id="top-center" class="btn btn-outline-success btn-sm">Create</button>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Input with Icons end -->
</div>


<div id="main">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Types</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <button id="basic" class="btn btn-outline-primary btn-block btn-lg">Basic
                                        Toast</button>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <button id="background"
                                        class="btn btn-outline-primary btn-block btn-lg">Custom
                                        Background</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            @endsection
