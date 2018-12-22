<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Lang;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders= Order::all();
        return view('admin.order.list',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
         try {
        
        return view('admin.order.edit',compact('order'));
         } catch (\Exception $error) {
             return back()->with('status',('Error'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
         try {
            $data=$request->all();
            $order->update($data);
            return back()->with('status', Lang::get('messages.success'));
        } catch (\Exception $e) {
            return back()->with('status', Lang::get('messages.fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $order=Order::withCount('orderdetails')->where('id',$id)->first() ;
        try {
            if($order->orderdetails_count==0)
               {
                    $order->delete();
                    return back()->with('status', Lang::get('delete.success'));
                    }   
            return back()->with('status', Lang::get('delete.fail'));
        } catch (\Exception $error) {
             return back()->with('status',('Error'));
        }
    }

    public function orderDetail($id)
    {
        //
        $order=Order::with('orderdetails')->where('id',$id)->first() ;
        $total = 0;
        foreach ($order->orderdetails as $item) {
            $total += $item->quantity * $item->unit_price;
        }
        return view('admin.order.detail',compact('order','total'));
    }
}
