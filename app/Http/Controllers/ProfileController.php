<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profits=Profile::groupBy('user_id')
       ->selectRaw('user_id, sum(amount) as amount')->get();
        // return $profits;
        return view('dashboard.profit.index',compact('profits'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profits=Profile::where('user_id',$id)->orderBy('id','desc')->get();
        $profits_amount=Profile::where('user_id',$id)->sum('amount');
        $id=$id;
        // return $profits_amount;
        return view('dashboard.profit.show',compact('profits','profits_amount','id'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function printprofit($id)
    {
        $profits=Profile::where('user_id',$id)->orderBy('id','desc')->get();
        $profits_amount=Profile::where('user_id',$id)->sum('amount');
        // return $profits_amount;
        return view('dashboard.profit.print',compact('profits','profits_amount'));
    }
}
