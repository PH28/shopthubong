<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Category;
use App\Image;
use App\Cart;
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
    public function getAddtocart(Request $request,$id)
    {
         $product =Product::where('id',$id)->first();
        
         $oldCart=Session('cart')?Session::get('cart'):null;
         $cart = new Cart($oldCart); // khoi tao gio hang
         $cart->add($product,$id); // them vao gio hang
         $request->session()->put('cart', $cart);// put  gio hang vao session cart
         return redirect()->back();
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
