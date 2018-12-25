@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order No.{{$order->id}}
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                        <form action="{{route('orders.update',$order->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group" >
                                <label>Customer Name</label>
                                <select class="form-control" name="user_id">
                                 @foreach ($userIds as $key => $value)
                                @if($key != 0)     
                                   @if($key == $order->user_id )
                                  <option value="{{$key}}" selected="seleted">{{$value}}</option>
                                  @else
                                  <option value="{{$key}}" >{{$value}}</option>
                                  @endif
                                @endif

                                @endforeach
                                </select>
                        </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" name="phone_order" value="{{$order->phone_order}}" />
                            </div>
                            <div class="form-group">
                                <label>Address Order</label>
                                <input class="form-control" name="address_order" value="{{$order->address_order}}" />
                            </div>
                            <button type="submit" class="btn btn-default">Order Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection