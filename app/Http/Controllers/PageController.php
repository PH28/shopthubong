<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class PageController extends Controller
{
    public function getIndex() // get trang chu
    {
    	$slide = Slide::all(); // get all;
    	
    	return view('page.home', compact('slide'));
    }
    public function getCategory()
    {
    	return view('page.category');
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
