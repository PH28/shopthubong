<h1>Xin chào {{$user->fullname}} </h1>
<h1>Nhấn vào đường link ở dưới để xác thực tài khoản :</h1>

<a href="{{route('users.verify',$user->verify_token)}}" title="">Verify</a>

