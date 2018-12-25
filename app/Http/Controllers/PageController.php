<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
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
    public function getCategory($id)
    {
        $product_by_category = Product::with('images')->where('category_id', $id)->get();
    	return view('page.category', compact('product_by_category'));
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
