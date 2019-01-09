var cart= [];
//Kiểm tra cái localStorage có giỏ hàng chưa
if (JSON.parse(localStorage.getItem('cart'))) {
    cart = [];
    cart = JSON.parse(localStorage.getItem('cart'));
}
//khi click vào mua sản phẩm sẽ lưu vào local storages
print_shopping(cart);
$('.add-cart').on('click',  function(event)  {
    console.log(cart);
    event.preventDefault();
    var id = $(this).attr('id');
    var subtotal = 0;
    var name = $(this).attr('data-name');
    var price = $(this).attr('data-price');
    var action = 'add';
    var qtt = 1;
    subtotal = qtt * price;
    var data = {
        id: id,
        name: name,
        price: price,
        qtt: qtt,
        subtotal: subtotal
    };
    var ext = false;
    if (cart.length > 0) {
        $.each(cart, function(index, val) {
            if (val.id == data.id) {
                console.log('cong qtt len 1');
                val.qtt++;
                ext = true;
                return false;
            } 
        });
    }
    if (!ext) {
        cart.push(data);
    } 
    localStorage.setItem('cart', JSON.stringify(cart));
    alert('Thêm giỏ hàng thành công');
    print_shopping(cart);
});
print_shopping();
function print_shopping(data = "") {
    var html = '';
    var htmltotal = '';
    var itemc = 0;
    var total = 0.00;
    html = '<div class="table-responsive" id="order_table"><table class="table table-bordered table-striped"><tr><th width="40%">Product Name</th><th width="10%">Quantity</th><th width="20%">Price</th><th width="15%">SubTotal</th><th width="5%">Action</th></tr>';
        if (data != null) {
            $.each(data, function(index, val) {
                itemc++;
                total += val.subtotal;
                html +='<tr id="table-cart">'
                    + '<td>'+val.name+'</td>'
                    + '<td>'+val.qtt+'</td>'
                    + '<td>'+val.price+'</td>'
                    + '<td>'+val.subtotal * val.qtt+'</td>'
                    + '<td>'
                        + '<button name="delete" class="btn btn-danger btn-xs delete" id="'+index+"\">Remove</button></td>"
                + '</tr>';
                   });
        } else {
            html += 
                '<tr>'
                    +'<td colspan="5" align="center">'
                        +'Your Cart is Empty!'
                    +'</td>'
                +'</tr>';
        }
        // xuất total ra màn hình
        if (itemc != 0) {
            $('.badge').text(itemc);
        }
        $('#cart_details').html(html);
}
$(document).on('click','.delete', function() {
    if (confirm("Bạn có muốn xóa sản phẩm này ra khỏi giỏ hàng không?")) {
        if (cart.length == 1) {
            cart = [];
        } else {
            var item = $(this).attr('id');
            console.log(item);
            cart.splice(item, 1);
            console.log(cart);
        }
        localStorage.setItem('cart',JSON.stringify(cart))
        $('#cart-popover').popover('hide');
        print_shopping(cart);
        alert('Bạn đả xóa sản phẩm ra khỏi giỏ hàng');
    }
});
$(document).on('click', '#clear_cart',function() {
    if (confirm("Bạn có chắc chắn xóa tất cả sản phẩm ra khỏi giỏ hàng không?")) {
        cart = [];
        localStorage.setItem('cart',JSON.stringify(cart));
        $('#cart-popover').popover('hide');
        alert('Bạn đả xóa tất cả sản phẩm ra khỏi giỏ hàng');
        print_shopping(cart);        
    }
});