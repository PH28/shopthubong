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

                                <label for="">Category </label>
                                <select class="form-control" name="category_id">
                                @foreach ($categoryIds as $key => $value)
                                 
                                  <option value="{{$key}}" >{{$value}}</option>
                                 
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="">Product Name </label>
                                <input class="form-control" name="name" placeholder="Please Enter Product Name" value="{{ old('name') }}" />
                                 @if($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="form-group required"> 
                                <label for="">Product Quantity </label>
                                <input class="form-control" name="quantity" placeholder="Please Enter Product Quantity" value="{{ old('quantity') }}" />
                                 @if($errors->has('quantity'))
                                        <p class="text-danger">{{$errors->first('quantity')}}</p>
                                @endif
                            </div>
                            <div class="form-group required">
                                <label for="">Product Price </label>
                                <input class="form-control" name="price" placeholder="Please Enter Product Price" value="{{ old('price')}}" />
                                 @if($errors->has('price'))
                                        <p class="text-danger">{{$errors->first('price')}}</p>
                                @endif
                            </div>
                            <div class="form-group required">
                                <label for="">Product Description </label>
                                <textarea class="form-control" rows="3" name="description" >{{ old('description') }}</textarea>
                                 @if($errors->has('description'))
                                        <p class="text-danger">{{$errors->first('description')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Product Kind</label>
                                <label class="radio-inline">
                                    <input name="kind" value="1" checked="" type="radio">New
                                </label>
                                <label class="radio-inline">
                                    <input name="kind" value="0" type="radio">Old
                                </label>
                            </div>
                            <div class="form-group">
                                            <label>Image</label>
                                            <input type="file"  name="images[]" multiple>
                            </div>




				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>