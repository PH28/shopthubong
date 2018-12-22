@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$cates->name}}
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
                                <th>Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cates->childs as $item)
                            
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('categories.destroy',$item->id)}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('categories.edit',$item->id)}}">Edit</a></td>
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