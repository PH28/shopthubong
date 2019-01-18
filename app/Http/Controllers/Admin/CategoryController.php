<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Lang;

class CategoryController extends Controller
{
   public function index()
    {
        $categoryIds= Category::where('parent_id',0)->pluck('name', 'id');
        $categories= Category::all();
        return view('admin.category.list',compact('categories','categoryIds'));

    }
    public function dash(){
        $user_C = User::all()->count();
        $order_C = Order::all()->count();
        $order_A = Order::where('status',Order::APPROVE)->get()->count();
        $order_U =  Order::where('status',Order::UNAPPROVE)->get()->count();
        return view('admin.layout.dashboard',compact('user_C','order_C','order_A','order_U'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        // Validate the value...
        // try {
        // 	$categoryIds= Category::where('parent_id',0)->pluck('name', 'id');
        //  	return view('admin.category.create',compact('categoryIds'));
        // } catch (\Exception $e) {
        //     return back()->with('fail',$e->getMessage());
        // }
    
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        try {


             $category=Category::create($request->all());
            return response()->json([
                'data'=>$category,
                'message'=>'Tạo danh mục thành công'
            ],200);
        	// $data= $request->all();
        	// $category= Category::create($data);
        	// return redirect()->route('categories.show',$category->id)->with('success',('Tạo danh mục mới thành công'));

        } catch (\Exception $e) {
        	return back()->with('fail',$e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
         try {
        $categoryIds= Category::where('parent_id',0)->pluck('name', 'id');
        return view('admin.category.edit',compact('category','categoryIds'));
         } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
       try {
        	$data=$request->all();
       		$category->update($data);
        	 return back()->with('success',('Cập nhật danh mục thành công'));
        } catch (\Exception $e) {
        	return back()->with('fail',$e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
    
    	$category=Category::withCount('childs','products')->where('id',$id)->first() ;
        try {
        	if($category->childs_count==0)
            {
        		if($category->products_count==0)
		        	{
		        	$category->delete();
                     return response()->json([
                        'response'=>'0',
                        'message'=>'Xóa danh mục thành công'
                    ],200);
		        	 // return back()->with('success',('Xóa danh mục thành công'));

		        	}   
                    return response()->json([
                        'response'=>'1',
                        'message'=>'Xóa thất bại vì danh mục này có sản phẩm đang được bán'
                    ],200);
                //return back()->with('fail',('Xóa thất bại vì danh mục này có sản phẩm đang được bán'));
            }
            return response()->json([
                    'response'=>'2',
                    'message'=>'Xoá thất bại vì còn danh mục này có danh mục con',
                    ],200);
        	//return back()->with('fail',('Xoá thất bại vì còn danh mục này có danh mục con'));
        } catch (\Exception $error) {
        	   // return back()->with('fail',$e->getMessage());
               return response()->json([
                    'message'=>$e->getMessage(),
                    ],200);
        }

    }
    public function listCate($id)
    {
    	try {
    	$cates=Category::with('childs')->where('id',$id)->first() ;
        return view('admin.category.listofcate',compact('cates'));
        } catch (\Exception $error) {
             return back()->with('fail',$e->getMessage());
        }
    }
}
