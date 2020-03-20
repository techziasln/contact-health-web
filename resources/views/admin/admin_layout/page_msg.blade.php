
<div class="alert alert-card alert-danger text-center" role="alert">
    {{\Illuminate\Support\Facades\Session::get('page_msg')['msg']}}  @if(isset(\Illuminate\Support\Facades\Session::get('page_msg')['button']))
        <a href="{{url('/change/password/')}}"  class="btn btn-rounded btn-info ml-3 text-white">{{\Illuminate\Support\Facades\Session::get('page_msg')['button_name']}}</a>@endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

