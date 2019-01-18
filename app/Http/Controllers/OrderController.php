<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
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

    public function orderDetail($id)
    {
        //

        try {
            $user = User::where('id',Auth::user()->id)->first();
            $order=Order::with('orderdetails')->where('user_id',Auth::user()->id)->where('id',$id)->first() ;
            $total = 0;
            foreach ($order->orderdetails as $item) {
                $total += $item->quantity * $item->unit_price;

            }
             return view('user.page.orderdetail',compact('order','total','user'));
           
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function updateStatus($userid,$id)
    {
         try {
            if ($userid == Auth::user()->id) {
                # code...
                $status = Order::CANCEL;
                $order = Order::find($id);
                $order->status = $status;
                $order->save();
                Mail::to($order->email_order)->send(new OrderMail($order,$status));
                return redirect()->route('home.message')->with('success', 'Đơn hàng đã được hủy');
            }
          
        } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
        }
    }
    
}
