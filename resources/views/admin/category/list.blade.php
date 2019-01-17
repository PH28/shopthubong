@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách danh mục
                        </h1>
                    </div>
                    <div class="col-lg-7" >
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
                        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Thêm danh mục</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Danh mục con</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($categories as $item)
                            @if($item->id != 0)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td >{{$item->name}}</td>
                                <td align="center"><a href="{{route('categories.listCate',$item->id)}}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-eye">
                                </i></button></a></td>
                                <td align="center"><a href="{{route('categories.edit',$item->id)}}"><button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil "></i>
                                </button></a></td>
                                <td align="center"><button  data-id="{{$item->id}}" type="button" class="btn btn-danger btn-circle btn-delete fa fa-trash-o "></button></td>
                                
                                
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
       @include('admin.category.add')
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
                  parent_id: $('#parent-add').val(),
                  name: $('#name-add').val(),
                  description: $('#description-add').val(),
                  
                 
                },
                success: function(data) {
                    
                    $('#modal-add').modal('hide');
                    $(".modal-body input").val("");
                    $(".modal-body textarea").val("");
                    html = "";
                    html = html +
                           '<tr class="odd gradeX" >' +
                                '<td>' + data.data.id + '</td>' +
                                '<td >' + data.data.name + '</td>' +
                                '<td align="center">'+ "<a href=\""+"admin/categories/"+data.data.id+"/listCate"+"\" >"+'<button type="button" class="btn btn-info btn-circle">'+'<i class="fa fa-eye">'+
                                '</i>'+'</button>'+'</a>'+'</td>'+
                                '<td align="center">'+ "<a href=\""+"admin/categories/"+data.data.id+"/edit"+"\" >"+'<button type="button" class="btn btn-success btn-circle">'+'<i class="fa fa-pencil ">'+'</i>'+
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
                  if (confirm('Bạn muốn xóa danh mục này ?')) {
                  $.ajax({

                  type:'DELETE',
                  url:'admin/categories/' + id + '/delete/',
                  
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