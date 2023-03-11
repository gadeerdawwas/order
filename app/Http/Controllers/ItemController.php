<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

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
}
