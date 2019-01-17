@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh mục: {{$cates->name}}
                        
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
                        @if($cates->parent_id == 0)
                        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Thêm danh mục</a>
                        @endif
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cates->childs as $item)
                            
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td align="center"><a href="{{route('categories.edit',$item->id)}}"><button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil "></i>
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
        <div class="modal fade" id="modal-add">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="" data-url="{{route('categories.store')}}" id="form-add" method="POST" role="form">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm danh mục</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group "  >
                                        <label >Danh mục cha: {{$cates->name}}</label>
                                        <input class="form-control" type="hidden" id="parent-add"  value="{{$cates->id}}" />
                                    </div>
                                    <div class="form-group required">
                                        <label for="">Tên danh mục </label>
                                        <input class="form-control" id="name-add" placeholder="Please Enter Category Name" " />
                                        @if($errors->has('name'))
                                                <p class="text-danger">{{$errors->first('name')}}</p>
                                        @endif

                                    </div>
                                    <div class="form-group required">
                                        <label>Mô tả </label>
                                        <textarea class="form-control" rows="3" id="description-add" value=""></textarea>
                                        @if($errors->has('description'))
                                                <p class="text-danger">{{$errors->first('description')}}</p>
                                        @endif
                                    </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                    console.log(data.data);
                    $('#modal-add').modal('hide');
                    $(".modal-body #name-add").val("");
                    $(".modal-body textarea").val("");
                    html = "";
                    html = html +
                           '<tr class="odd gradeX" >' +
                                '<td>' + data.data.id + '</td>' +
                                '<td >' + data.data.name + '</td>' +
                                '<td align="center">'+ "<a href=\""+"admin/categories/"+data.data.id+"/edit"+"\" >"+'<button type="button" class="btn btn-success btn-circle">'+'<i class="fa fa-pencil">'+
                                '</i>'+'</button>'+'</a>'+'</td>'+
                                
                                '<td align="center">' + "<button  data-id=\""+data.data.id+"\"  type=\"button\" class=\"btn btn-danger btn-circle btn-delete fa fa-trash-o \">" + '</button>' + '</td>' +
                                
                                
                            '</tr>';
                    $('tbody').prepend(html);
                    toastr.success(data.message)
                    
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

            $('.btn-delete').click(function () {
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