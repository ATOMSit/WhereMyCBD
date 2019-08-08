@if ($message = Session::get('success'))
    <div class="alert alert-success fade show" role="alert">
        <div class="alert-icon">
            <i class="flaticon-warning"></i>
        </div>
        <div class="alert-text">
            <strong>{{ $message }}</strong>
        </div>
    </div>
@endif