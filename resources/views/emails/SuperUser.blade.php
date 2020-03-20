x

@component('mail::message')
 <p>Username : {{$data->email}} </p>
 <p>Temporary password : {{$temp_pass}}</p>




 @component('mail::button', ['url' => 'http://'.request()->getHost().':'.request()->getPort().'/login'.'?email=' .$data->email])
  Login
 @endcomponent

 Thanks,<br>
 Vitamin Palace
@endcomponent