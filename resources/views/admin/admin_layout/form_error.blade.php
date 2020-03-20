@foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <strong class="text-capitalize">Error !</strong> {{$error}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

@endforeach