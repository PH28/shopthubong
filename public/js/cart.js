var cart = []; // array

		if(JSON.parse(localStorage.getItem('cart'))) 
		{
			cart = JSON.parse(localStorage.getItem('cart'));
			console.log("have cart");
		}

		$('.add-to-cart').on('click', function(event){

	 		event.preventDefault(); // don't load page
	 		var subTotal =0;
	 		 var id = $(this).attr('data-id');
	 		 var image = $(this).attr('data-image');
	 		 var name = $(this).attr('data-name');
	 		 var price = $(this).attr('data-price');
	 		 var action = 'add';
	 		 var quantity= 1;
	 		 var data = {
	 		 	id: id,
	 		 	image: "source/image/product/"+image,
	 		 	name: name,
	 		 	price: price,
	 		 	quantity:quantity,
	 		 	subTotal: subTotal
	 		 }

	 		//check product exist in cart
	 		var isProductexist = false;
	 		for(var i=0; i<cart.length; i++)
	 		{
	 			if(cart[i].id == data.id)
	 			{
	 				isProductexist = true;
	 				break;
	 			}
	 		}
	 		// 
	 		if(!isProductexist)
	 		{
	 			cart.push(data);
	 		} else {
	 			cart[i].quantity += 1;
	 		}
	 		localStorage.setItem('cart', JSON.stringify(cart));
	 		alert('Sản phẩm đã được thêm vào giỏ hàng');
	 		showCart(cart);
		});
		function removeUnit(id)
	 		{
	 			if(confirm("Bạn có muốn xóa sản phẩm khỏi giỏ hàng?"))
	 			{
	 				for(var i=0; i<cart.length; i++)
	 				{
		 				if(cart[i].id == id)
		 				{
		 					cart.splice(i, 1);
		 					break;
		 				}
	 				}
	 			showCart(cart);
	 			localStorage.setItem('cart', JSON.stringify(cart));
	 			}
	 			
	 		}
	 	function changeUnitQuantity(elementHTML, id)
	 	{
	 		var quantityInput = elementHTML.value;
	 		if(quantityInput > 0 && quantityInput <= 10)
	 		{	
	 			for(var i=0; i<cart.length; i++)
	 			{
	 				if(cart[i].id == id)
	 				{
	 					cart[i].quantity = quantityInput;
	 					break;
	 				}
	 			}
	 			showCart(cart);
	 		}
	 		else{
	 			alert("Giá trị nhập vào không hợp lệ!");
	 		}
	 	}

		function showCart(cart)
		{

			 var html = '';
	    	var htmltotal = '';
	    	var totalMoney = 0;
	    	html = '<div class="table-responsive" id="order_table"><table class="table table-bordered table-striped"><tr><th width="30%">Product Name</th><th width="20%">Image</th><th width="10%">Quantity</th><th width="20%">Price</th><th width="15%">SubTotal</th><th width="5%">Action</th></tr>';
			if (cart != null) {
				
				for(var i=0; i < cart.length; i++) 
	            {
	            	totalMoney += cart[i].price * cart[i].quantity;
	                html +='<tr id="table-cart">'
	                    + '<td><p>'+cart[i].name+'</p></td>'
	                    + '<td><img src="'+ cart[i].image+'" width=50 height=50> </td>'
	                    + '<td> <input type="number" onchange="changeUnitQuantity(this,'+ cart[i].id+')" name="" min=1 max=20 step =1 value="'+cart[i].quantity+'"</td>'
	                    + '<td>'+cart[i].price+'</td>'
	                    + '<td>'+cart[i].quantity * cart[i].price+
	                    '</td>'
	                    + '<td>'
	                     + '<button name="delete" onclick="removeUnit('+ cart[i].id +')" class="btn btn-danger btn-xs delete" id="'+i+"\">Remove</button></td>"
	                + '</tr>'
	            }
	            html+= '<td colspan="6"> <h3> Tổng tiền: </h3><h4>' +  totalMoney + ' VND </h4></td>'
			}
			else{
				html += 
	                	'<tr>'
	                    +'<td colspan="5" align="center">'
	                        +'Your Cart is Empty!'
	                    +'</td>'
	                	+'</tr>';
				
			}
			$('#cart_details').html(html);

		}
		