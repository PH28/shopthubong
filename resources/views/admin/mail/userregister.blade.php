<h1>Xin chào {{$user->fullname}} </h1>
<h1>Nhấn vào đường link ở dưới để xác thực tài khoản :</h1>
<<<<<<< HEAD
<a href="{{route('users.verify',$user->verify_token)}}" title="">Verify</a>
=======
<a href="{{route('pageusers.verify',$user->verify_token)}}" title="">Verify</a>
>>>>>>> 995682e630023edadb12cbbc1d2a02f476b9a12f
