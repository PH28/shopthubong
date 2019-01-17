@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12"> 
                        <h1 class="page-header">Mã đơn hàng: {{$order->id}} 

                        </h1>
                        
                    </div>
                    
                 <div class="col-lg-7" >
                    <!-- /.col-lg-12 -->
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
                        <div class="dropdown">
                                 @if($order->status == 0)
                                <span class="btn btn-flat btn-info " style="margin-bottom: 10px" >
                                      Đơn hàng đã được duyệt                    
                                </span>
                                @elseif($order->status == 1)
                                <button class="btn btn-flat btn-info btn-danger dropdown-toggle" type="button" id="dropdownMenu1" name="action" data-toggle="dropdown" style="margin-bottom: 10px ">
                                      Đơn hàng đang chờ duyệt
                                </button>
                                @else
                                <span class="btn btn-flat btn-info btn-warning" style="margin-bottom: 10px">
                                      Đơn hàng đã được hủy
                                </span>
                                @endif
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                   @if($order->status == 1)
                                   <li role="presentation"><a role="menuitem" onclick="return confirm('Bạn muốn duyệt đơn hàng này ?');" tabindex="-1" href="{{ route('orders.status',['id'=>$order->id,'status'=>'0']) }}">Duyệt đơn hàng</a></li>
                                   <li role="presentation"><a role="menuitem" onclick="return confirm('Bạn muốn hủy đơn hàng này ?');" tabindex="-1" href="{{ route('orders.status',['id'=>$order->id,'status'=>'2']) }}">Hủy đơn hàng</a></li>
                                   @endif
                                </ul>
                                </div>
                     	<div class="form-group" >
                                <label>Tên khách hàng </label>
                                <input class="form-control" name="name" value="{{$order->user->fullname}}" />
                        </div>
                            <div class="form-group">
                                <label>SĐT </label>
                                <input class="form-control" name="name" value="{{$order->phone_order}}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ </label>
                                <input class="form-control" name="quantity" value="{{$order->address_order}}" />
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input class="form-control" name="quantity" value="{{$order->email_order}}" />
                            </div>
                            <div class="form-group">
                                <label>Phương thức thanh toán: </label>
                                 @if($order->payment == 1 )
                                 <input class="form-control" name="fullname"  value="Ví điện tử" >
                                @else
                                 <input class="form-control" name="fullname"  value="CoD" >
                                @endif
                            </div>
                            
                            
                          

                 
                </div>
            </div>

            <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">Các sản phẩm đang được đặt: 
                        </h4>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                               
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($order->orderdetails as $item)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                @if(!empty($item->product->getFirstImageAttribute()->image))
                                <td>
                                    <img src="{!! asset('images/'.$item->product->getFirstImageAttribute()->image) !!}" width="100"  height="80" alt="">
                                </td>
                                @else
                                  <td>  <img src="" width="100"  height="80" alt=""> </td>
                                @endif
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <th>{{number_format($item->unit_price)}} VND</th>
                            </tr>
                            @endforeach
                            <tr >
                                <th style="border-right: none">Tổng tiền: </th>
                                <td style="border-right: none;"></th>
                                <th style="border-right: none"></th>
                                <th></th>
                                <th>{{number_format($total)}} VND</th>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection