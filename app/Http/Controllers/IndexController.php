<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Category;
use App\Image;
use App\Cart;
use App\User;
use App\Order;
use App\OrderDetail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    //
    public function index()
    {
        return view('user.page.index');
    }

    public function showAllProduct()
    {
        $products = Product::orderBy('id','asc')->paginate(9);
        $new_products = Product::where('kind',Product::NEW_PRODUCT)->limit(5)->get();
        return view('user.page.shop', compact( 'products','new_products'));
    }

    public function getProduct($id)
    {
        $product = Product::where('id',$id)->first();
        $product_related = Product::where('category_id', $product->category_id)->where('id','<>', $product->id)->get();
    	return view('user.page.product', compact('product','product_related'));
    }

    public function getProductOfCategory($id)
    {
        $products = Product::where('category_id',$id)->paginate(9);
        $other_products = Product::where('category_id','<>' ,$id)->limit(5)->get();
    	return view('user.page.product_category', compact('products','other_products'));
    }

    public function cart($id)
    {
        $user = Auth::user();
        return view('user.page.checkout2', compact('user'));
    }

    public function checkOut()
    {
        return view('user.page.checkout');
    }

    public function orderdetail(Request $request)
    {
        if(!empty($request->cart))
        {
        $data_order = [
            'user_id' => $request->id,
            'date_order' => '2018/1/1',
            'email_order' => $request->email,
            'phone_order' => $request->phone,
            'address_order' => $request->address,
            'status' => Order::UNAPPROVE,
            'total' => 0,
            'payment' => 1,
        ];
        $data = $request->cart;
        $total = 0;
        $order= Order::create($data_order);
        for ($i=0; $i < count($data) ; $i++) { 
            # code...
             OrderDetail::create([
                            'order_id' => $order->id,
                            'product_id' => $data[$i]['id'],
                            'quantity'=> $data[$i]['qtt'],
                            'unit_price' => $data[$i]['price']
                        ]);
             $total += $data[$i]['qtt']*$data[$i]['price'];
        }
        $order->total = $total;
        $order->save();
        return response()->json([
                'response' => '0',
                'message'=>'Tạo đơn hàng thành công'
            ],200);
        }

        return response()->json([
                'response' => '1',
                'message'=>'Giỏ hàng không có sản phẩm'
            ],200);
    }
}
