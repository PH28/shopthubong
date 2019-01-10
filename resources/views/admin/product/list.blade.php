@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
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
                        <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Add Product</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Kind</th>
                                <th>Detail</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
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
                                <td>New</td>
                                @else
                                <td>Old</td>
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