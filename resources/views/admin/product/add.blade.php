<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="" data-url="{{route('products.store')}}" id="form-add" method="POST" role="form"
                enctype="multipart/form-data"
            >
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Thêm sản phẩm mới</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group required" >

                                <label for="">Danh mục</label>
                                <select class="form-control" name="category_id" id="category_id">
                                @foreach ($categoryIds as $key => $value)
                                 
                                  <option value="{{$key}}" >{{$value}}</option>
                                 
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="">Tên sản phẩm </label>
                                <input class="form-control" name="name" placeholder="Please Enter Product Name" value="{{ old('name') }}" id="name"/>
                                 @if($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="form-group required"> 
                                <label for="">Số lượng </label>
                                <input class="form-control" name="quantity" placeholder="Please Enter Product Quantity" value="{{ old('quantity') }}" id="quantity" />
                                 @if($errors->has('quantity'))
                                        <p class="text-danger">{{$errors->first('quantity')}}</p>
                                @endif
                            </div>
                            <div class="form-group required">
                                <label for="">Giá </label>
                                <input class="form-control" name="price" placeholder="Please Enter Product Price" value="{{ old('price')}}" id="price"/>
                                 @if($errors->has('price'))
                                        <p class="text-danger">{{$errors->first('price')}}</p>
                                @endif
                            </div>
                            <div class="form-group required">
                                <label for="">Mô tả </label>
                                <textarea class="form-control" rows="3"  id="description" name="description" >{{ old('description') }}</textarea>
                                 @if($errors->has('description'))
                                        <p class="text-danger">{{$errors->first('description')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control" name="kind" id="kind">
                                  <option value="1" >Mới</option>
                                  <option value="2" >Cũ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" id="images" name="images" multiple ">
                            </div>




				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Thêm</button>
				</div>
			</form>
		</div>
	</div>
</div>