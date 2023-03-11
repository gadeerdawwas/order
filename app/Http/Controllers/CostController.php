<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costs=Cost::orderBy('id','desc')->get();
        $sumcost=Cost::sum('costs');
        return view('dashboard.cost.index',compact('costs','sumcost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('dashboard.cost.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cost::create([
            'costs' => $request->costs,
            'note' => $request->note
        ]);
        Alert::success('نجاح ', 'تم إضافة المصاريف بنجاح');
        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Cost::find($id)->update([
            'costs' => $request->costs,
            'note' => $request->note
        ]);
        Alert::success('نجاح ', 'تم تعديل المصاريف بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cost::find($id)->delete();
        Alert::success('نجاح ', 'تم حذف المصاريف بنجاح');
        return redirect()->back();
    }
}
