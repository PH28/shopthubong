var checkcart = [];

if(JSON.parse(localStorage.getItem('cart'))) {
	checkcart = JSON.parse(localStorage.getItem('cart'));
	printorder(checkcart);
} else {
	$('#orderError').html("Không có trong sản phẩm trong giỏ hàng");
}
function printorder(data) {
	var checkhtml = '';
	var checktotalhtml = '';
	var totalc = 0;
	if (data.length > 0) {
		$.each(data, function(index, val) {
		totalc += (val.price * val.qtt);
		checkhtml += '<tr>'
			+ '<td>' + val.name + '</td>'

			+ '<td> <img src="'+ val.image+'" width=40 height=40></td>'
			+ '<td> ' + val.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+ " VND" + '</td>'
			+ "<td id=\"soluong\">" + "<input type=\"number\" name=\"quantity\" class=\"soluong\" data_qtt=\""+val.qtt+"\" id=\""+val.id+"\" value=\""+val.qtt+"\">" + '</td>'
			+ '<td id="subtotal">' + (val.price * val.qtt).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+" VND" + '</td>'
			+ '<td>' + '<button name="delete" class="btn btn-danger btn-xs remove" id="'+index+"\">Remove</button></td>"
			+ '</tr>'; 
		
		});
	} else {
		checkhtml = '<tr>'
                    +'<td colspan="5" align="center">'
                        +'Không có sản phẩm trong giỏ hàng'
                    +'</td>'
                +'</tr>';
	} 
	$('tbody').html(checkhtml);
	var total_money  = totalc.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
	$('#totalcheckout').html(total_money.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+ " VND");
}



$(document).on('click', '.remove',function() {
	if (confirm("Bạn có muốn xóa sản phẩm này ra khỏi giỏ hàng không?")) {
        if (cart.length == 1) {
            cart = [];
        } else {
            var item = $(this).attr('id');
            cart.splice(item, 1);
        }
        localStorage.setItem('cart',JSON.stringify(cart))
        $('#cart-popover').popover('hide');
        printorder(cart);
        alert('Bạn đả xóa sản phẩm ra khỏi giỏ hàng');
    }
});