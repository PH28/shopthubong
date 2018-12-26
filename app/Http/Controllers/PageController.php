<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Category;
class PageController extends Controller
{
    public function getIndex() // get trang chu
    {
    	$slide = Slide::all(); // get all;
        $product = Product::with('images')->where('kind',1)->get();
        $product_remain = Product::with('images')->where('kind',0)->get();
        // foreach ($product as $item) {
        //     foreach ($item->images as $value) {
        //         echo $value->image."<hr>";

        //     }
        // }
        //dd($product);
    	return view('page.home', compact('slide','product','product_remain'));
    }
    public function getCategory($id) // $id of category
    {
        $product_by_category = Product::with('images')->where('category_id', $id)->get();
        $product_order = Product::with('images')->where('category_id','<>',$id)->paginate(3);
        $category = Category::all(); 
        unset($category[0]); 
        $show_category = Category::where('id',$id)->first();
    	return view('page.category', compact('product_by_category','product_order','category', 'show_category'));
    }
    public function getProduct()
    {
    	return view('page.product');
    }
    public function getContact()
    {
    	return view('page.contact');
    }
    public function getAbout()
    {
    	return view('page.about');
    }
}
