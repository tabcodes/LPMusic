@if(session('status'))
    <div class="row justify-content-center my-2">
        <div class="col-md-6">
            @if(session('status') == "success")
                <div class="shadow h-100 text-white">
                    <div class="card-header bg-success">
                        <i class="fas fa-check"></i>
                        Success
                    </div>
                    <div class="card-body text-dark bg-light">
                        {{ session('message') }}
                    </div>
                </div>
            @elseif(session('status') == "failure")
                <div class="shadow h-100 text-white">
                    <div class="card-header bg-danger">
                        <i class="fas fa-times"></i>
                        Error
                    </div>
                    <div class="card-body text-dark bg-light">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif

