@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
				  @if(session('success'))
                        <div class="alert alert-danger">
                       
                            {{session('success')}}
                        
                        </div>
                        @endif
                     @if(session('fail'))
                        <div class="alert alert-danger">
                       
                            {{session('fail')}}
                        
                        </div>
                        @endif
			<form action="{{ route('pageusers.login') }}" method="post" class="beta-form-checkout">
				<div class="row">
					<div class="col-sm-3">
					
					</div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>
						 @csrf
					
						 <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng nhập</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection