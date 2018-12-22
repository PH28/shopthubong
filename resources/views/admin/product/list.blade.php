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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr >
                                <th>ID</th>
                                
                                <th>Name</th>
                                
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Kind</th>

                                <th>Edit</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('products.detail',$item->id)}}">{{$item->name}}</a></td>
                                <td>{{$item->quantity}}</td>
                                <td>{{number_format($item->price)}} VND</td>
                                @if($item->kind == 1)
                                <td>New</td>
                                @else
                                <td>Old</td>
                                @endif
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('products.edit',$item->id)}}"  >Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('products.destroy',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa!')"> Delete</a></td>
                                
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