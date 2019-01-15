<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="" data-url="{{route('users.store')}}" id="form-add" method="POST" role="form">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Add User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group required" >
                                <label for="">Role Id </label>
                                <select class="form-control" name="role_id" id="role-add">
                                @foreach ($role_id as $key => $value)                            
                                  <option value="{{$key}}" >{{$value}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="">User Name </label>
                                <input class="form-control" name="username" id="username-add" placeholder="Please Enter User Name" value="{{ old('username') }}"   />
                            </div>
                            @if($errors->has('username'))
                                        <p class="text-danger">{{$errors->first('username')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Full Name </label>
                                <input class="form-control" name="fullname" id="fullname-add" placeholder="Please Enter Full Name" value="{{ old('fullname') }}" />
                            </div>
                            @if($errors->has('fullname'))
                                        <p class="text-danger">{{$errors->first('fullname')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Gender </label>
                                <select class="form-control" name="gender" id="gender-add">
                                    <option value="0"> Khác </option>
                                     <option value="1"> Nam</option>
                                      <option value="2"> Nữ </option>
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="">Date of birth </label>
                                <input class="form-control" type="date" name="dob"  value="{{ old('dob') }}" id="dob-add"/>
                            </div>
                            @if($errors->has('dob'))
                                        <p class="text-danger">{{$errors->first('dob')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Email </label>
                                <input class="form-control" name="email" placeholder="Please Enter Email" id="email-add" value="{{ old('email') }}"  />
                            </div>
                            @if($errors->has('email'))
                                        <p class="text-danger">{{$errors->first('email')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Address </label>
                                <input class="form-control" name="address" placeholder="Please Enter adress" id="address-add" value="{{ old('address') }}"/>
                            </div>
                            @if($errors->has('address'))
                                        <p class="text-danger">{{$errors->first('address')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Phone </label>
                                <input class="form-control" name="phone" placeholder="Please Enter phone" id="phone-add" value="{{ old('phone') }}" />
                            </div>
                            @if($errors->has('phone'))
                                        <p class="text-danger">{{$errors->first('phone')}}</p>
                            @endif



				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>