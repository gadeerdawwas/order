<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $sumcost=Cost::sum('costs');
        $deiver_order=Order::where('state_payment',1)->sum('total');
        $nodeiver_order=Order::where('state_payment',2)->sum('total');
        $Item=Item::where('state',5)->get();
        $User=User::where('role',2)->count();
        $User_ship=Item::where('state',4)->sum('price_Shipping');
        $total=0;
        foreach($Item as $t){
            $total +=$t->number * $t->price + $t->price_Shipping;
        }
        // return $total;
        return view('dashboard.index',compact('User_ship','sumcost','deiver_order','nodeiver_order','total','User'));
    }
    public function password()
    {
        return view('dashboard.user.password');
    }
    public function passwordupdate(Request $request)
    {
        $id=auth()->user()->name;
        $Validator=Validator( $request->all(),[

            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]
        ,[
            'password.confirmed' => 'كلمة المرور غير متطابقة' ,
            'password.min' => 'كلمة المرور يجب 8 أرقام او أحرف على الأقل ' ,
        ]
    );

        if (! $Validator->fails()) {

            User::find(auth()->user()->id)->update([

                'password' => Hash::make($request->password),
            ]);
            Alert::success('نجاح ', '  تمت تغير كلمة المرور بنجاح');
            return redirect()->back();
        }else{
            Alert::success('فشل ', '  لم تتم تغير كلمة المرور ');
            return redirect()->back();
        }


        Alert::success('فشل ', $Validator->getMessageBag()->first());
        return redirect()->back();
    }
}
