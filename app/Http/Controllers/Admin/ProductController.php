<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Review;
use App\Image;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Lang;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $products= Product::all();
       
        return view('admin.product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoryIds= Category::where('id','>','2')->pluck('name', 'id');
        return view('admin.product.create',compact('categoryIds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $array = [];
        $data = $request->all();
        try {
            if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach($files as $file) {
                    $name = $file->getClientOriginalName();
                    $image = str_random(4)."_".$name;
                    $destinationPath = public_path('/images');
                    while(file_exists(public_path('/images').$image)){
                         $image = str_random(4)."_".$name;
                    }
                    $file->move($destinationPath, $image);
                    array_push($array, $image);
                }
            }
            $product= Product::create($data);
            foreach ($array as $item) {
                        Image::create([
                            'product_id' => $product->id,
                            'image' => $item,
                            'url' => $item
                        ]);
            }
            return back()->with('status', Lang::get('category.success'));
        } 
        catch (\Exception $e) {
            return back()->with('status',('Error'));
        }

    }
       
        // 
        //
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $categoryIds= Category::where('id','>','2')->pluck('name', 'id');
        return view('admin.product.edit',compact('product','categoryIds'));
    }

    public function listReview(Product $product)
    {
        //
        $reviews = $product->reviews;
        return view('admin.review.list',compact('product','reviews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        try {

       $data=$request->all();
       $product->update($data);
       return redirect()->route('products.index');
       }
        catch (\Exception $e) {
            return back()->with('status',('Error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $product=Product::withCount('orders')->where('id',$id)->first() ;
        try {
            if($product->orders_count==0)
             {
                    $product->delete();
                    return back()->with('status', Lang::get('delete.success'));
            }   
            return back()->with('status', Lang::get('delete.fail'));
        }
        catch (\Exception $e) {
            return back()->with('status',('Error'));
        }
    }


    public function detailProduct($id)
    {

        $product=Product::with('images','reviews')->where('id',$id)->first() ;
        return view('admin.product.detail',compact('product'));
    }
}
