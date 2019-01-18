<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Review;
use App\Image;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
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

        $categoryIds= Category::where('parent_id','!=','0')->pluck('name', 'id');
        $products=Product::all();
        return view('admin.product.list',compact('products','categoryIds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoryIds= Category::where('parent_id','!=','0')->pluck('name', 'id');
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

        try {
            $array = [];
             $data = $request->all();
            if ($request->hasFile('images')) {
                $array = [];
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
            if (!empty($product->getFirstImageAttribute()->image)) {
                    $image =$product->getFirstImageAttribute()->image;
            }
            else
            {
                $image =  "";
            }
            
            return response()->json([
                'data'=>$product,
                'message'=>'Thêm sản phẩm thành công',
                'image' => $image,
            ],200);
        } 
        catch (\Exception $e) {
            return back()->with('fail',$e->getMessage());
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
        $categoryIds= Category::where('parent_id','!=','0')->pluck('name', 'id');
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
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
       
           
        try {
            $array = [];
            $data = $request->except('image');
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
            $product->update($data);
            foreach ($array as $item) {
                        Image::create([
                            'product_id' => $product->id,
                            'image' => $item,
                            'url' => $item
                        ]);
            }
            return back()->with('success',('Cập nhật sản phẩm thành công'));
        } 
        catch (\Exception $e) {
            return back()->with('fail',$e->getMessage());
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
                    $product->reviews()->delete();
                    $product->images()->delete();
                    $product->delete();
                      return response()->json([
                        'response'=>'0',
                        'message'=>'Xóa sản phẩm thành công'
                    ],200);
            }   
             return response()->json([
                        'response'=>'1',
                        'message'=>'Xóa thất bại vì sản phẩm đang được đặt hàng'
                    ],200);
        }
        catch (\Exception $e) {
            return response()->json([
                    'message'=>$e->getMessage(),
                    ],200);
        }
    }


    public function detailProduct($id)
    {

        $product=Product::with('images','reviews')->where('id',$id)->first() ;
        return view('admin.product.detail',compact('product'));
    }
}
