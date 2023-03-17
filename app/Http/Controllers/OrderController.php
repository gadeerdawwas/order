<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\Profile;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::orderBy('id','desc')->get();
        if(auth()->user()->role == 1 || auth()->user()->role == 3){
            $orders=Order::orderBy('id','desc')->get();
        }
        if(auth()->user()->role == 2){
            $orders=Order::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        }

        return view('dashboard.order.index',compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=User::where('role',2)->get();
        return view('dashboard.order.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $names = $request->input('name');
        $images = $request->input('image');
        $links = $request->input('link');
        $Shipping_types = $request->input('Shipping_type');
        $descriptions = $request->input('description');
        $numbers = $request->input('number');
        $sizes = $request->input('size');
        $prices = $request->input('price');
        $price_Shippings = $request->input('price_Shipping');
        $total= null ;

        // return count($names);
        $order=Order::create([
            'total' => 0,
            'user_id' =>$request->user_id
        ]);

        // return $order->id;
        if(!empty($request->name)){

            for($count = 0; $count < count($names); $count++)
            {
                $image_name='';
                if ($request->has('image')) {
                    $FileEx = $request->file('image')[$count]->getClientOriginalExtension();
                    // return  $FileEx;
                    $image_name = time() . '_' . rand() . '.' . $FileEx;
                    $request->file('image')[$count]->move(public_path('upload/order'), $image_name);

                }
                Item::create([

                    'name'  => $names[$count],
                    'image'  => $image_name,
                    'link'  => $links[$count],
                    'Shipping_type'  => $Shipping_types[$count],
                    'description'  => $descriptions[$count],
                    'number'  => $numbers[$count],
                    'size'  => $sizes[$count],
                    'price'  => $prices[$count],
                    'price_Shipping'  => $price_Shippings[$count],
                    'order_id' =>  $order->id

                ]);

                $total += $numbers[$count] * $prices[$count] + $price_Shippings[$count];

                Profile::create([
                    'amount' => - $total,
                    'order_id' => $order->id ,
                    'user_id' => $request->user_id
                ]);

            }



            Order::find($order->id)->update([
                'total' => $total
            ]);
            Alert::success('نجاح ', '
            تم إضافة الطلبية بنجاح
            اجمالى الطلبية : '.$total  );
            return redirect()->route('admin.orders.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders=Order::find($id);
        // $user=User::where('role',2)->get();
        // return '0000000';
        return view('dashboard.order.show',compact('orders'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orders=Order::find($id);
        $user=User::where('role',2)->get();
        return view('dashboard.order.edit',compact('orders','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $order=Order::find($id);
        // return $order->Item;

        $name = $request->input('name');
        $link = $request->input('link');
        $size = $request->input('size');

        $Shipping_types = $request->input('Shipping_type');
        $numbers = $request->input('number');
        $sizes = $request->input('size');
        $prices = $request->input('price');
        $price_Shippings = $request->input('price_Shipping');
        $total= null ;


        // if(!empty($request->numbers)){

            for($count = 0; $count < count($order->Item); $count++)
            {
                // return $order->Item[$count]->id;




                Item::find($order->Item[$count]->id)->update([
                    'Shipping_type'  => $Shipping_types[$count],
                    'number'  => $numbers[$count],
                    'price'  => $prices[$count],
                    'price_Shipping'  => $price_Shippings[$count],
                    'name'  => $name[$count],
                    'link'  => $link[$count],
                    'size'  => $size[$count],
                ]);

                $total += $numbers[$count] * $prices[$count] + $price_Shippings[$count];

                Profile::where('order_id' , $order->id)->update([
                    'amount' => - $total,
                    'user_id' => $request->user_id
                ]);

            }



            Order::find($order->id)->update([
                'total' => $total
            ]);
            Alert::success('نجاح ', '
            تم تعديل الطلبية بنجاح
            اجمالى الطلبية : '.$total  );
            return redirect()->route('admin.orders.index');
    // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Order::find($id)->delete();
        Item::where('order_id',$id)->delete();
        Alert::success('نجاح ', 'تم حذف طلبية بنجاح');
        return redirect()->back();
    }
    public function orderupdatenot(Request $request , $id)
    {

        Order::find($id)->update([
            'notifcation' => 1
        ]);
        // Alert::success('نجاح ', 'تم تعديل طلبية بنجاح');
        return redirect()->route('admin.orders.show',$id);
    }
    public function ordersedit(Request $request , $id)
    {
        if ($request->state == 1) {
            Order::find($id)->update([
                'state_payment' => $request->state
            ]);
            // redirect()->with('success', 'User Deleted successfully.');

            Alert::success('نجاح ', 'تم تعديل طلبية بنجاح');
            return redirect()->back();
        } else {
            Order::find($id)->update([
                'state_payment' => $request->state
            ]);
            // Alert::success('نجاح ', 'تم تعديل طلبية بنجاح');
            return redirect()->back();
        }


    }
    public function itemsedit(Request $request , $id)
    {

        Item::find($id)->update([
            'state' => $request->state
        ]);
        Alert::success('نجاح ', 'تم تعديل طلبية بنجاح');
        return redirect()->back();
    }
    public function orderfeedback(Request $request , $id)
    {

        Feedback::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id ,
            'order_id'  => $id
        ]);
        Alert::success('نجاح ', 'تم إضافة ملاحظة بنجاح');
        return redirect()->back();
    }
    public function orders_print($id)
    {


        $orders=Order::where('user_id',$id)->get();
        $orders_count=Order::where('user_id',$id)->count();
        $profits_amount=Order::where('user_id',$id)->sum('total');
        return view('dashboard.order.print',compact('orders','orders_count','profits_amount'));

    }
    public function singleorder_print($id)
    {


        $orders=Item::where('order_id',$id)->get();
        // $orders_count=Order::where('user_id',$id)->count();
        $profits_amount=Order::where('id',$id)->sum('total');
        // return $orders;
        return view('dashboard.order.singleprint',compact('orders','profits_amount'));

    }
    public function orders_delete($id)
    {


        $Order=Order::where('user_id',$id)->pluck('id');

        Order::where('user_id',$id)->delete();
        Item::whereIn('order_id',$Order)->delete();
        Profile::whereIn('order_id',$Order)->delete();
        Alert::success('نجاح ', 'تم حذف طلبية بنجاح');
        return redirect()->back();

    }
    public function itemseditshop(Request $request, $id)
    {


        $Order=Order::where('user_id',$id)->pluck('id');

        Item::whereIn('order_id',$Order)->update([
            'Shipping_type' => $request->Shipping_type

        ]);
        Alert::success('نجاح ', 'تم حذف طلبية بنجاح');
        return redirect()->back();

    }
}
