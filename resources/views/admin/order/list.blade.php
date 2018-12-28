@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order
                            <small>List</small>
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
                                <th>Customer Name</th>
                                <th>Phone Order</th>
                                <th>Date Order</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
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
                                <td><div class="dropdown">
                                 @if($item->status == 0)
                                <button class="btn btn-flat btn-info  dropdown-toggle" type="button" id="dropdownMenu1" name="action" data-toggle="dropdown" style="width:100px" disabled>
                                      Approve                       
                                    <span class="caret"></span>
                                </button>
                                @else
                                <button class="btn btn-flat btn-info btn-danger dropdown-toggle" type="button" id="dropdownMenu1" name="action" data-toggle="dropdown" style="width:100px">
                                      Unapprove
                                    <span class="caret"></span>
                                </button>
                                @endif
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                   @if($item->status == 1)
                                   <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('orders.status',['id'=>$item->id,'status'=>'0']) }}">Approve</a></li>
                                   @endif
                                </ul>
                                </div></td>
                                <td align="center"><a href="{{route('orders.orderdetail',$item->id)}}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-eye">
                                </i></button></a></td>
                                <td align="center"><a href="{{route('orders.edit',$item->id)}}"><button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil "></i>
                                </button></a></td>
                                <td align="center"><a href="{{route('orders.destroy',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa!')"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-trash-o "></i>
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