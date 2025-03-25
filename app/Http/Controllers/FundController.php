<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\FundDetail;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Fund::with('category')->paginate(5);
        return view('user.fund', compact('data'));
    }

    public function indexAdmin() {
        $data = Fund::all();
        return view('admin.fund', compact($data));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'owner_id' => 'required',
            'category_id' => 'required',
            'currAmount' => 'required',
            'targetAmount' => 'required',
            'fund_details' => 'required|array',
            'fund_details.*.types' => 'required',
            'fund_details.*.imageOrVideo' => 'required',
        ]);

        $fund = Fund::create([
            'name' => $request->name,
            'description' => $request->description,
            'owner_id' => $request->owner_id,
            'category_id' => $request->category_id,
            'currAmount' => $request->currAmount,
            'targetAmount' => $request->targetAmount,
        ]);

        foreach ($request->fund_details as $detail) {
            FundDetail::create([
                'fund_id' => $fund->id,
                'types' => $detail['types'],
                'imageOrVideo' => $detail['imageOrVideo'],
            ]);
        }

        return redirect()->back()->with('success', 'Fund added successfully!');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
