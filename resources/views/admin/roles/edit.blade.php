@extends('layouts-admin.layaouts', ['menu' => 'authentication', 'submenu' => 'role'])

@section('title', 'Update Roles')

@section('content')

<div class="page-content">

    <!-- Input with Icons start -->
    <section id="input-with-icons">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Role</h4>
                        <a href="{{ route('role.index') }}" class="btn btn-sm text-primary" style="float: right"><i class="fas fa-backward"></i><a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('role.update', $role) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('admin.roles.form-control', ['submit' => 'Update'])
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Input with Icons end -->

</div>



@endsection
