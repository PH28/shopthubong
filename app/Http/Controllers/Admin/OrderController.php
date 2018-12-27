<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\User;
use Illuminate\Support\Facades\Lang;
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
        $userIds= User::pluck('fullname', 'id');
        return view('admin.order.edit',compact('order','userIds'));
        } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
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
            return back()->with('success', ('Cập nhật thông tin khách thành công'));
        } catch (\Exception $e) {
            return back()->with('fail',$e->getMessage());
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
                    return back()->with('success', ('Xóa đơn hàng thành công'));
                    }   
            return back()->with('fail', ('Xóa đơn hàng thất bại vì đơn hàng đang được xử lý'));
        } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
        }
    }

    public function orderDetail($id)
    {
        //
        try {
        $order=Order::with('orderdetails')->where('id',$id)->first() ;
        $total = 0;
        foreach ($order->orderdetails as $item) {
            $total += $item->quantity * $item->unit_price;
        }
        return view('admin.order.detail',compact('order','total'));
        } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
        }
    }


    public function updateStatus($id,$status)
    {
        $productqty = 0;
        $oderqty = 0 ;
         try {
            if ($status == 0) {
                # code...
                $order = Order::withCount('orderdetails')->where('id',$id)->first() ;
                if($order->orderdetails_count > 0){
                $order->status = $status;
                foreach ($order->orderdetails as $item) {
                    $orderqty = $item->quantity;
                    $productqty = $item->product->quantity;
                    $item->product->quantity = $productqty - $orderqty;
                    $item->product->save();
                }
                $order->save();
                Mail::to($order->email_order)->send(new OrderMail($order));
                return back()->with('success', ('Cập nhật trạng thái thành công'));
                }
                return back()->with('fail', ('Cập nhật trạng thái thất bại vì đơn hàng không có sản phẩm nào được mua'));
                
            }
            if ($status == 1) {
                # code...
                $order = Order::find($id);
                $order->status = $status;
                foreach ($order->orderdetails as $item) {
                    $orderqty = $item->quantity;
                    $productqty = $item->product->quantity;
                    $item->product->quantity = $productqty + $orderqty;
                    $item->product->save();
                }
                $order->save();
                return back()->with('success',('Update success'));
            }
          
        } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
        }
    }
}
