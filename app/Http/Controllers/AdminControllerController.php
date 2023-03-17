<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdminController;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class AdminControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User=User::where('role',1)->orderBy('id','desc')->get();
        return view('dashboard.admin.index',compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'name' => ['string', 'max:255'],
            'phone' => ['string','unique:users,phone'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        if(! $Validator->fails()){
            $user =User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'role' => 1,
                'password' => Hash::make($request->password),
            ]);

            $role = Role::find(1);

            $permissions = Permission::pluck('id','id')->all();

            $role->syncPermissions($permissions);
            $user->assignRole([$role->id]);

            $user->assignRole([$role->id]);
            Alert::success('نجاح ', 'تم إضافة الأدمن بنجاح');
            return redirect()->back();
            // return redirect()->back()->with('success', 'تم إضافة الأدمن بنجاح');

        }else{
            Alert::error('فشل ', 'لم بتم إضافة الأدمن ');
            return redirect()->back();
            // return back()->with('errors', 'لم يتم إضافة الأدمن');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $Request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $user=User::find($id);
        return view('dashboard.admin.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        User::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        Alert::success('نجاح ', 'تم تعديل الادمن بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        User::find($id)->delete();
        Alert::success('نجاح ', 'تم حذف الادمن بنجاح');
        return redirect()->back();
    }
}
