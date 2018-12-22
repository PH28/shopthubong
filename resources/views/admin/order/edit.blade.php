@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                        <form action="{{route('orders.update',$order->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group" >
                                <label>Customer Name</label>
                                <input class="form-control" name="name" value="{{$order->user->fullname}}" />
                        </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" name="name" value="{{$order->phone_order}}" />
                            </div>
                            <div class="form-group">
                                <label>Address Order</label>
                                <input class="form-control" name="quantity" value="{{$order->address_order}}" />
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                <input class="form-control" name="price" value="{{number_format($order->total)}} VND"/>
                            </div>
                            <div class="form-group">
                                <label>Payment</label>
                                 <select class="form-control" name="parent_id">
                                  @if($order->payment == 1 )
                                  <option  selected="seleted">ATM</option>
                                  <option>CoD</option>
                                  @else
                                  <option  selected="seleted" disabled="">CoD</option>
                                  <option >ATM</option>
                                  @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                 <select class="form-control" name="parent_id">
                                  @if($order->payment == 0 )
                                  <option  selected="seleted" >Unapprove</option>
                                  <option >Shipping</option>
                                  <option >Approve </option>
                                  @elseif($order->status == 1)
                                  <option   >Unapprove</option>
                                  <option selected="seleted">Shipping</option>
                                  <option >Approve </option>
                                  @else
                                  <option >Unapprove</option>
                                  <option >Shipping</option>
                                  <option selected="seleted">Approve </option>
                                  @endif
                                </select>
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