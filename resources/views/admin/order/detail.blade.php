@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12"> 
                        <h1 class="page-header"> Order No.{{$order->id}} 
                            <small>Detail</small>
                            

                        </h1>
                        
                    </div>
                    
                 <div class="col-lg-7" >
                    <!-- /.col-lg-12 -->
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
                                  <option  selected="seleted" disabled="">ATM</option>
                                  @else
                                  <option  selected="seleted" disabled="">CoD</option>
                                  @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                 <select class="form-control" name="parent_id">
                                  @if($order->payment == 0 )
                                  <option  selected="seleted" disabled="">Unapprove</option>
                                  @elseif($order->status == 1)
                                  <option  selected="seleted" disabled="">Shipping</option>
                                  @else
                                  <option  selected="seleted" disabled="">Approve</option>
                                  @endif
                                </select>
                            </div>
                            
                          

                 
                </div>
            </div>

            <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">Orderdetail of Order No.{{$order->id}} 
                            <small>List</small>
                        </h4>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                               
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderdetails as $item)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <th>{{number_format($item->unit_price)}} VND</th>
                            </tr>
                            @endforeach
                            <tr style=" ">
                                <th style="border-right: none">Total</th>
                                <td style="border-right: none;"></th>
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