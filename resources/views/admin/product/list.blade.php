@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách sản phẩm
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
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
                    <div class="col-lg-12" style="margin-bottom: 10px">
                        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Thêm sản phẩm</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Loại</th>
                                <th>Chi tiết</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                @if(!empty($item->getFirstImageAttribute()->image))
                                <td>
                                    <img src="{!! asset('images/'.$item->getFirstImageAttribute()->image) !!}" width="100"  height="80" alt="">
                                </td>
                                @else
                                  <td>  <img src="" width="100"  height="80" alt=""> </td>
                                @endif
                                <td class="center">{{$item->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{number_format($item->price)}} VND</td>
                                @if($item->kind == 1)
                                <td>Mới</td>
                                @else
                                <td>Cũ</td>
                                @endif
                                <td align="center"><a href="{{route('products.detail',$item->id)}}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-eye">
                                </i></button></a></td>
                                <td align="center"><a href="{{route('products.edit',$item->id)}}"><button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil "></i>
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
        @include('admin.product.add')
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
              var formData = new FormData();
              
              formData.append('category_id', $('#category_id').val());
              formData.append('name', $('#name').val());
              formData.append('quantity', $('#quantity').val());
              formData.append('price', $('#price').val());
              formData.append('description', $('#description').val());
              formData.append('kind', $('#kind').val());
              if ($('#images')[0].files.length > 0) {
                  for (var i = 0; i < $('#images')[0].files.length; i++)
                      formData.append('images[]', $('#images')[0].files[i]);
              }

              var url = $(this).attr('data-url');
              console.log(url);
              $.ajax({
                type: 'POST',
                url: url,
                cache: false,
                contentType: false,
                processData:false,
                 data: formData,
                success: function(data) {
                    
                    html = "";
                    html = html +
                           '<tr class="odd gradeX" >' +
                                '<td>' + data.data.id + '</td>' +
                                '<td >' + "<img src=\""+"images/"+ data.image + "\"" + "width=\"100\"  height=\"80\" alt=\"\" >" + '</td>' +
                                '<td >' + data.data.name + '</td>' +
                                '<td >' + data.data.quantity + '</td>' +
                                '<td >' + data.data.price + '</td>' +
                                '<td >' + data.data.kind + '</td>' +
                                '<td align="center">'+ "<a href=\""+"admin/products/"+data.data.id+"/detail"+"\" >"+'<button type="button" class="btn btn-info btn-circle">'+'<i class="fa fa-eye">'+
                                '</i>'+'</button>'+'</a>'+'</td>'+
                                '<td align="center">'+ "<a href=\""+"admin/products/"+data.data.id+"/edit"+"\" >"+'<button type="button" class="btn btn-success btn-circle">'+'<i class="fa fa-pencil ">'+'</i>'+
                                '</button>'+'</a>'+'</td>'+
                                '<td align="center">' + "<button  data-id=\""+data.data.id+"\"  type=\"button\" class=\"btn btn-danger btn-circle btn-delete fa fa-trash-o \">" + '</button>' + '</td>' +
                                
                                
                            '</tr>';
                    $('tbody').prepend(html);
                    $('#modal-add').modal('hide');
                    $(".modal-body input").val("");
                    $(".modal-body textarea").val("");
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

            $(document).on('click','td .btn-delete', function() {
                  var id = $(this).data('id');
                  var _this = $(this);
                  console.log(id);
                  if (confirm('Bạn muốn xóa sản phẩm này ?')) {
                  $.ajax({

                  type:'DELETE',
                  url:'admin/products/' + id + '/delete/',
                  
                  success:function(data) {
                     console.log(data);
                     if(data.response == '0'){
                      toastr.success(data.message)
                      _this.parent().parent().remove();
                     }
                     if(data.response == '1'){
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