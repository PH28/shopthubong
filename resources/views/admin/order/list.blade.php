@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách đơn hàng
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Khách hàng</th>
                                <th>SĐT</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                                <th>Sửa</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $item)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td>{{$item->user->fullname}}</td>
                                <td>{{$item->phone_order}}</td>
                                <td>{{$item->date_order}}</td>
                                <td>{{number_format($item->total)}} VND</td>
                                <td align="center"><div class="dropdown">
                                 @if($item->status == 0)
                                <span class="btn btn-flat btn-info " style="width:120px" >
                                      Đã duyệt                     
                                </span>
                                @elseif($item->status == 1)
                                <button class="btn btn-flat btn-info btn-danger dropdown-toggle" type="button" id="dropdownMenu1" name="action" data-toggle="dropdown" style="width:120px">
                                      Đang chờ duyệt
                                </button>
                                @else
                                <span class="btn btn-flat btn-info btn-warning" style="width:120px">
                                      Đã hủy
                                </span>
                                @endif
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                   @if($item->status == 1)
                                   <li role="presentation"><a role="menuitem" onclick="return confirm('Bạn muốn duyệt đơn hàng này ?');" tabindex="-1" href="{{ route('orders.status',['id'=>$item->id,'status'=>'0']) }}">Duyệt đơn hàng</a></li>
                                   <li role="presentation"><a role="menuitem" onclick="return confirm('Bạn muốn hủy đơn hàng này ?');" tabindex="-1" href="{{ route('orders.status',['id'=>$item->id,'status'=>'2']) }}">Hủy đơn hàng</a></li>
                                   @endif
                                </ul>
                                </div></td>
                                <td align="center"><a href="{{route('orders.orderdetail',$item->id)}}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-eye">
                                </i></button></a></td>
                                <td align="center"><a href="{{route('orders.edit',$item->id)}}"><button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil "></i>
                                </button></a></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection