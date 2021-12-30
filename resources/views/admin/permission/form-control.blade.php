<div class="row">
    <div class="col-sm-6">
        <h6>Permission Name</h6>
        <div class="form-group position-relative has-icon-left">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Permission Name"
            value="{{ old('name') ?? $permission->name }}" autocomplete="name" autofocus required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <h6>Guard Name</h6>
        <div class="form-group position-relative has-icon-right">
            <input type="text" class="form-control" name="guard_name" id="guard_name" placeholder="Default Web" readonly>
            <div class="form-control-icon">
                <i class="bi bi-bookmarks"></i>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-4 mt-3">
        <button id="top-center" class="btn btn-outline-success btn-sm">{{ $submit }}</button>
    </div>

</div>
