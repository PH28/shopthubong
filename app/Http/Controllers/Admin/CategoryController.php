<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Lang;

class CategoryController extends Controller
{
   public function index()
    {

        $categories= Category::all();
        return view('admin.category.list',compact('categories'));

    }
    public function dash(){
        $user_C = User::all()->count();
        $order_C = Order::all()->count();
        $order_A = Order::where('status',0)->get()->count();
        $order_U =  Order::where('status',1)->get()->count();
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
        try {
        	$categoryIds= Category::where('parent_id',0)->pluck('name', 'id');
         	return view('admin.category.create',compact('categoryIds'));
        } catch (\Exception $e) {
            return back()->with('fail',$e->getMessage());
        }
    
         
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
        	$data= $request->all();
        	$category= Category::create($data);
        	return back()->with('success',('Create success'));
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
    public function update(Request $request, Category $category)
    {
        //
       try {
        	$data=$request->all();
       		$category->update($data);
        	 return back()->with('success',('Update success'));
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
        		if($category->products_count==0)
		        	{
		        	$category->delete();
		        	 return back()->with('success',('Delete success'));
		        	}   
        	return back()->with('fail',('Delete failed'));
        } catch (\Exception $error) {
        	   return back()->with('fail',$e->getMessage());
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
