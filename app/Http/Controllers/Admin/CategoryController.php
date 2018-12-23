<?php

namespace App\Http\Controllers\Admin;

use App\Category;
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
             return back()->with('status',('Error'));
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
        	return back()->with('status', Lang::get('messages.success'));
        } catch (\Exception $e) {
        	 return back()->with('status',('Error'));
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
         } catch (\Exception $error) {
             return back()->with('status',('Error'));
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
        	return back()->with('status', Lang::get('messages.success'));
        } catch (\Exception $e) {
        	return back()->with('status', Lang::get('messages.fail'));
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
		        	return back()->with('status', Lang::get('category.success'));
		        	}   
        	return back()->with('status', Lang::get('category.fail'));
        } catch (\Exception $error) {
        	 return back()->with('status',('Error'));
        }
    }
    public function listCate($id)
    {
    	try {
    	$cates=Category::with('childs')->where('id',$id)->first() ;
        return view('admin.category.listofcate',compact('cates'));
        } catch (\Exception $error) {
             return back()->with('status',('Error'));
        }
    }
}

