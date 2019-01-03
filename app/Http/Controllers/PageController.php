<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\User\LoginController;
use App\Slide;
use App\Product;
use App\Category;
use App\Image;
use App\Cart;
use App\User;
use App\Order;
use Session;
class PageController extends Controller
{

    public function getIndex() // get trang chu
    {
    	$slide = Slide::all(); // get all;
        $product = Product::with('images')->where('kind',Product::NEW_PRODUCT)->paginate(4);
        $product_remain                 = Product::with('images')->where('kind',Product::OLD_PRODUCT)->paginate(3);
        
    	return view('page.home', compact('slide','product','product_remain'));
    }
    public function getCategory($id) // $id of category
    {
        $product_by_category = Product::with('images')->where('category_id', $id)->get();
        $product_other = Product::with('images')->where('category_id','<>',$id)->paginate(3);
        $category = Category::all(); 
        unset($category[0]); 
        $show_category = Category::where('id',$id)->first();
    	return view('page.category', compact('product_by_category','product_other','category', 'show_category'));
    }
    public function getProduct(Request $request)
    {
        $product = Product::where('id',$request->id)->first();
        $product_related = Product::with('images')->where('category_id', $request->id)->paginate(2); // product have same category
    	return view('page.product', compact('product','showImage', 'product_related'));
    }
    public function getContact()
    {
    	return view('page.contact');
    }
    public function getAbout()
    {
    	return view('page.about');
    }
    public function getCheckout()
    {
        return view('page.checkout');
    }
    public function postCheckout(Request $request)
    {
        $user = new User();
        $list_user = User::all();
        $order = new Order();
        $order->date_order = $request->date_order;
        $order->address_order =$request->address_order;
        $order->phone_order = $request->phone_order;
        $order->email_order = $request->email_order;
        $order->total = 10000;
        $order->payment=1;
        $order->status =1;
        $order->user_id=1;
        //$order->save();
       if(LoginController::getInstance()->checkUserlogin())
       {
        // da login    
         }
       else
       {
        // chua login
      }
    
     
    }
    public function getCatDetail()
    {
        return view('page.cart');
    }
    public function getFormLogin()
    {
        return view('page.login');
    }
    public function getFormSignup()
    {
        return view('page.signup');
    }
  
}
