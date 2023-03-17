<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Profile;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function waitorder()
    {
        // return auth()->user()->id;
        $orders=Item::with('Order')->where('state',0)->orderBy('id','desc')->get();

        if(auth()->user()->role == 1 || auth()->user()->role == 3){
            $orders=Item::with('Order')->where('state',0)->orderBy('id','desc')->get();
        }
        if(auth()->user()->role == 2){
            $order=Order::where('user_id',auth()->user()->id)->pluck('id');
            $orders=Item::whereIn('order_id',$order)->with('Order')->where('state',0)->orderBy('id','desc')->get();
        }
        // return $orders;
        return view('dashboard.order.waitorder',compact('orders'));
    }

    public function buyorder()
    {
        $orders=Item::with('Order')->where('state',1)->orderBy('id','desc')->get();


        if(auth()->user()->role == 1 || auth()->user()->role == 3){
            $orders=Item::with('Order')->where('state',1)->orderBy('id','desc')->get();
        }
        if(auth()->user()->role == 2){
            $order=Order::where('user_id',auth()->user()->id)->pluck('id');
            $orders=Item::whereIn('order_id',$order)->with('Order')->where('state',1)->orderBy('id','desc')->get();
        }

        return view('dashboard.order.buyorder',compact('orders'));
    }
    public function shopingorder()
    {
        $orders=Item::with('Order')->where('state',2)->orderBy('id','desc')->get();


        if(auth()->user()->role == 1 || auth()->user()->role == 3){
            $orders=Item::with('Order')->where('state',2)->orderBy('id','desc')->get();
        }
        if(auth()->user()->role == 2){
            $order=Order::where('user_id',auth()->user()->id)->pluck('id');
            $orders=Item::whereIn('order_id',$order)->with('Order')->where('state',2)->orderBy('id','desc')->get();
        }
        return view('dashboard.order.shopingorder',compact('orders'));
    }
    public function Deliveryprogresorder()
    {
        $orders=Item::with('Order')->where('state',3)->orderBy('id','desc')->get();


        if(auth()->user()->role == 1 || auth()->user()->role == 3){
            $orders=Item::with('Order')->where('state',3)->orderBy('id','desc')->get();
        }
        if(auth()->user()->role == 2){
            $order=Order::where('user_id',auth()->user()->id)->pluck('id');
            $orders=Item::whereIn('order_id',$order)->with('Order')->where('state',3)->orderBy('id','desc')->get();
        }
        return view('dashboard.order.Deliveryprogresorder',compact('orders'));
    }
    public function Deliveryorder()
    {
        $orders=Item::with('Order')->where('state',4)->orderBy('id','desc')->get();


        if(auth()->user()->role == 1 || auth()->user()->role == 3){
            $orders=Item::with('Order')->where('state',4)->orderBy('id','desc')->get();
        }
        if(auth()->user()->role == 2){
            $order=Order::where('user_id',auth()->user()->id)->pluck('id');
            $orders=Item::whereIn('order_id',$order)->with('Order')->where('state',4)->orderBy('id','desc')->get();
        }
        return view('dashboard.order.Deliveryorder',compact('orders'));
    }
    public function referenceorder()
    {
        $orders=Item::with('Order')->where('state',5)->orderBy('id','desc')->get();


        if(auth()->user()->role == 1 || auth()->user()->role == 3){
            $orders=Item::with('Order')->where('state',5)->orderBy('id','desc')->get();
        }
        if(auth()->user()->role == 2){
            $order=Order::where('user_id',auth()->user()->id)->pluck('id');
            $orders=Item::whereIn('order_id',$order)->with('Order')->where('state',5)->orderBy('id','desc')->get();
        }
        return view('dashboard.order.referenceorder',compact('orders'));
    }
    public function feedback()
    {
        $Feedback=Feedback::get();
        return view('dashboard.order.feedback',compact('Feedback'));
    }
    public function order_user($id)
    {
        $orders=Order::where('user_id',$id)->orderBy('id','desc')->get();
        $user_id=$id;

        return view('dashboard.order.userindex',compact('orders','user_id'));
    }
    public function showone_order($id)
    {
        $orders=Item::find($id);
        $user_id=$id;

        return view('dashboard.order.showorder',compact('orders','user_id'));
    }
    public function myproductsDeleteAll(Request $request)
    {
        $ids = $request->ids;
        Order::whereIn('id',explode(",",$ids))->delete();
        Item::whereIn('order_id',explode(",",$ids))->delete();
        Profile::whereIn('order_id',explode(",",$ids))->delete();

        return response()->json(['success'=>"تم حذف طلبيات بنجاح."]);
    }
}
