<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="" data-url="{{route('categories.store')}}" id="form-add" method="POST" role="form">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Thêm danh mục</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group required"  >
                                <label for="">Danh mục cha </label>
                                <select class="form-control" id="parent-add">
                                    <option value="0" >Danh mục gốc</option>
                                @foreach ($categoryIds as $key => $value) 

                                @if($key != 0)                           
                                  <option value="{{$key}}" >{{$value}}</option>
                                @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="">Tên danh mục </label>
                                <input class="form-control" id="name-add" placeholder="Please Enter Category Name" " />
                                @if($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                @endif

                            </div>
                            <div class="form-group required">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3" id="description-add" value=""></textarea>
                                @if($errors->has('description'))
                                        <p class="text-danger">{{$errors->first('description')}}</p>
                                @endif
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