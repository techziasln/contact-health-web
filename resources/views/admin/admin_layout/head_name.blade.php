<div class="breadcrumb">
    <h1>{{$head_name}}</h1>
    <ul>
        <li><a href="">{{Carbon\Carbon::now()->dayName}}</a></li>
        <li>{{ date('d F Y', strtotime(date("m/d/Y")))}}</li>
    </ul>
</div>