@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách người dùng
                        </h1>
                    </div>
                    <div class="col-lg-12">
                     @if(session('success'))
                        <div class="alert alert-success">     
                            {{session('success')}}
                        </div>
                        @endif
                        @if(session('fail'))
                        <div class="alert alert-danger">     
                            {{session('fail')}}
                        </div>
                        @endif
                         @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                     </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12" style="margin-bottom: 10px">
                        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Thêm người dùng</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>Giới tính</th>
                                <th>Quyền hạn</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($listUser as $item)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td>{{$item->username}}</td>
                                @if($item->gender == 0)
                                <td>Khác</td>
                                @elseif($item->gender == 1)
                                <td>Nam</td>
                                @else
                                <td>Nữ</td>
                                @endif
                                <td>{{$item->role->name}}</td>
                                <td>{{$item->email}}</td>
                                
                                @if($item->status == 1)
                                <td>Đã xác thực</td>
                                @else
                                <td>Chưa xác thực</td>
                                @endif
                                <td align="center"><a href="{{route('users.userdetail',$item->id)}}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-eye">
                                </i></button></a></td>
                                <td align="center"><a href="{{route('users.edit',$item->id)}}""><button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil "></i>
                                </button></a></td>
                                <td align="center"><button  data-id="{{$item->id}}" type="button" class="btn btn-danger btn-circle btn-delete fa fa-trash-o "></button></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @include('admin.user.add')
        <script src="admin_asset/js/jquery-3.2.1.slim.min.js"></script>
       <script src="admin_asset/js/popper.min.js"></script>
       <script src="admin_asset/js/bootstrap.min.js"></script>
       <script src ="admin_asset/js/jquery.min.js"></script>
       <script src="admin_asset/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
       <script type="text/javascript">
         $(document).ready(function () {


            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $('#form-add').submit(function(e){
              e.preventDefault();
              var url = $(this).attr('data-url');
              console.log(url);
              $.ajax({
                type: 'POST',
                url: url,
                data: {
                  role_id: $('#role-add').val(),
                  username: $('#username-add').val(),
                  fullname : $('#fullname-add').val(),
                  gender: $('#gender-add').val(),
                  dob: $('#dob-add').val(),
                  email : $('#email-add').val(),
                  address : $('#address-add').val(),
                  phone : $('#phone-add').val(),
                },
                success: function(data) {
                    gender = "";
                    role = "";
                    status = "";
                    if (data.data.gender == 0) {gender = "Khác";};
                    if (data.data.gender == 1) {gender = "Nam";};
                    if (data.data.gender == 2) {gender = "Nữ";};
                    if (data.data.status == 1) {status = "Đã xác thực";};
                    if (data.data.status == 2) {status = "Chưa xác thực";};
                    $('#modal-add').modal('hide');
                    $(".modal-body input").val("");
                    $(".modal-body textarea").val("");
                    html = "";
                    html = html +
                           '<tr class="odd gradeX" >' +
                                '<td>' + data.data.id + '</td>' +
                                '<td >' + data.data.username + '</td>' +
                                '<td >' + gender + '</td>' +
                                '<td >' + data.role + '</td>' +
                                '<td >' + data.data.email + '</td>' +
                                '<td >' + status + '</td>' +
                                '<td align="center">'+ "<a href=\""+"admin/users/"+data.data.id+"/userdetail"+"\" >"+'<button type="button" class="btn btn-info btn-circle">'+'<i class="fa fa-eye">'+
                                '<td align="center">'+ "<a href=\""+"admin/users/"+data.data.id+"/edit"+"\" >"+'<button type="button" class="btn btn-success btn-circle">'+'<i class="fa fa-pencil ">'+'</i>'+
                                '</button>'+'</a>'+'</td>'+
                                '<td align="center">' + "<button  data-id=\""+data.data.id+"\"  type=\"button\" class=\"btn btn-danger btn-circle btn-delete fa fa-trash-o \">" + '</button>' + '</td>' +
                                
                                
                            '</tr>';
                    $('tbody').prepend(html);
                    toastr.success(data.message)
                    console.log(data.data);
                    },
                error: function (data) {
                    var errors = data.responseJSON;
                    var errorsHtml = '';
                    console.log(data.responseJSON);
                    $.each(errors.errors, function( key, value ) {
                      errorsHtml =  value[0] ;
                      toastr.error( errorsHtml)
                    });
                    console.log( errorsHtml);
                }
              })
            });

            $(document).on('click','td .btn-delete', function() {
                  var id = $(this).data('id');
                  var _this = $(this);
                  console.log(id);
                  if (confirm('Bạn muốn xóa người dùng này ?')) {
                  $.ajax({

                  type:'DELETE',
                  url:'admin/users/' + id + '/delete/',
                  
                  success:function(data) {
                     console.log(data);
                     if(data.response == '0'){
                      toastr.success(data.message)
                      _this.parent().parent().remove();
                     }
                     if(data.response == '1'){
                      toastr.error(data.message)
                     }
                     if(data.response == '2'){
                      toastr.error(data.message)
                     }
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                        var err = JSON.parse(jqXHR.responseText);
                        toastr.error(err.Message);
                    }
               })
              }
            });


         })
      </script>
@endsection