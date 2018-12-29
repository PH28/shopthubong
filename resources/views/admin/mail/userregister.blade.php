<h1>Xin chào {{$user->fullname }}</h1>
<h1>Nhấn vào đường link ở dưới để xác thực tài khoản :</h1>
<a href="blog.com/user/{{$user->$verify_token}}">Xác thực</a>
