@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Trang quản trị</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$user_C}}</div>
                                    <div>Người dùng</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('users.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$order_C}}</div>
                                    <div>Đơn hàng</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('orders.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$order_A}}</div>
                                    <div>Đơn hàng đã duyệt</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('orders.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$order_U}}</div>
                                    <div>Đơn hàng chưa duyệt</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('orders.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                    <!-- /.col-lg-12 -->
                   
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection