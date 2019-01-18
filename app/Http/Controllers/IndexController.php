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
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Http\Requests\OrderRequest;
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

    public function cart()
    {
        $user = Auth::user();
        return view('user.page.checkout2', compact('user'));
    }

    public function message()
    {
        return view('user.page.message');
    }

    public function checkOut()
    {
        return view('user.page.checkout');
    }

    public function orderdetail( OrderRequest $request)
    {

        $dt = Carbon::now('Asia/Ho_Chi_Minh');

        if(!empty($request->cart))
        {
        $data_order = [
            'user_id' => Auth::user()->id,

            'date_order' => $dt->toDateString(),

            'email_order' => $request->email_order,
            'phone_order' => $request->phone_order,
            'address_order' => $request->address_order,
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
        Session::flash('success', 'Đặt hàng thành công');
        return response()->json([
                'response' => '0',
                'data' => $order,
                'cate' => count($data),
            ],200);
        }

        return response()->json([
                'response' => '1',
                'message'=>'Giỏ hàng không có sản phẩm'
            ],200);
    }


    public function listOrder(Request $request)
    {   
        if (empty($request->action)) {
            $orders = Order::where('user_id',Auth::user()->id)->paginate(10);
            $ordersc = Order::where('user_id',Auth::user()->id)->get();
            $count = count($ordersc);
            return view('user.page.checkorder', compact('orders','count'));
        }
        switch ($request->action) {

            case 'id':
                $orders = Order::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
                $ordersc = Order::where('user_id',Auth::user()->id)->get();
                $count = count($ordersc);
                $action = 'id';
                break;
            case 'date':
                $orders = Order::where('user_id',Auth::user()->id)->orderBy('date_order', 'desc')->paginate(10);
                $ordersc = Order::where('user_id',Auth::user()->id)->get();
                $count = count($ordersc);
                $action = 'date';
                break;
            case 'total':
                $orders = Order::where('user_id',Auth::user()->id)->orderBy('total', 'desc')->paginate(10);
                $ordersc = Order::where('user_id',Auth::user()->id)->get();
                $count = count($ordersc);
                $action = 'total';
                break;
            case 'approve':
                $orders = Order::where('user_id',Auth::user()->id)->where('status',Order::APPROVE)->orderBy('date_order', 'desc')->paginate(10);
                $ordersc = Order::where('user_id',Auth::user()->id)->where('status',Order::APPROVE)->get();
                $count = count($ordersc);
                $action = 'approve';
                break;
            case 'unapprove':
                $orders = Order::where('user_id',Auth::user()->id)->where('status',Order::UNAPPROVE)->orderBy('date_order', 'desc')->paginate(10);
                $ordersc = Order::where('user_id',Auth::user()->id)->where('status',Order::UNAPPROVE)->get();
                $count = count($ordersc);
                $action= 'unapprove';
                break;
            case 'cancel':
                $orders = Order::where('user_id',Auth::user()->id)->where('status',Order::CANCEL)->orderBy('date_order', 'desc')->paginate(10);
                $ordersc = Order::where('user_id',Auth::user()->id)->where('status',Order::CANCEL)->get();
                $count = count($ordersc);
                $action='cancel';
                break;
            default:
                # code...
                break;
        }
        return view('user.page.checkorder', compact('orders','action','count'));
    }
    public function searchProduct(Request $request)
    {
        $new_products = Product::where('kind',Product::NEW_PRODUCT)->limit(5)->get();

        $product = Product::where('name', 'like', '%'.$request->searchKey.'%')->orWhere('price',$request->searchKey)->paginate(3);

       //dd($product);
        return view('user.page.search', compact('product','new_products'));
    }
    public function getAbout()
    {
        return view('user.page.about');
    }
   
}
