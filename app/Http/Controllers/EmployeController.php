<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User=User::where('role',3)->orderBy('id','desc')->get();
        return view('dashboard.employ.index',compact('User'));
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
            'address' => [ 'string'],
            'phone' => ['string','unique:users,phone'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        if(! $Validator->fails()){
            $user =User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'role' => 3,
                'password' => Hash::make($request->password),
            ]);

            $role = Role::find(3);

            $permissions = Permission::pluck('id','id')->all();

            $role->syncPermissions($permissions);
            $user->assignRole([$role->id]);

            $user->assignRole([$role->id]);
            Alert::success('نجاح ', 'تم إضافة الموظف بنجاح');
            return redirect()->back();
            // return redirect()->back()->with('success', 'تم إضافة الموظف بنجاح');

        }else{
            Alert::error('فشل ', 'لم بتم إضافة الموظف ');
            return redirect()->back();
            // return back()->with('errors', 'لم يتم إضافة الموظف');

        }
        // Alert::error('فشل ', 'لم بتم إضافة الموظف ');
        // return back()->with('errors',  'لم يتم إضافة الموظف');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
       return view('dashboard.employ.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        User::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        Alert::success('نجاح ', 'تم تعديل الموظف بنجاح');
        return redirect()->back();
    }
    public function employupdate(Request $request, $id)
    {
        // return $request;
        User::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        Alert::success('نجاح ', 'تم تعديل الموظف بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        User::find($id)->delete();
        Alert::success('نجاح ', 'تم حذف الموظف بنجاح');
        return redirect()->back();
    }
}
