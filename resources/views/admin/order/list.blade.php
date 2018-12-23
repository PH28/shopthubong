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
                        @if(session('status'))
                        <div class="alert alert-danger">     
                            {{session('status')}}
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
                                @if($item->status == 0)
                                <td>Unapprove</td>
                                @elseif ($item->status == 1)
                                <td>Shipping</td>
                                @else
                                <td>Approve</td>
                                @endif
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('orders.orderdetail',$item->id)}}">View</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('orders.edit',$item->id)}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('orders.destroy',$item->id)}}"  onclick="return confirm('Bạn có chắc chắn muốn xóa!')"> Delete</a></td>
                                
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