<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\FundDetail;
use App\Models\FundHistory;
use App\Models\Comments;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Fund::with(['category', 'fundDetail'])->where('approvalStatus', 'approved')->whereColumn('currAmount', '<', 'targetAmount')->paginate(5);
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
        $data = Fund::with(['category', 'fundDetail', 'comment.user', 'comment.reply.user'])->findOrFail($id);

        return view('user.fundDetail', compact('data'));
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

    public function search(Request $request) {
        $query = $request->input('query');
        if (!$query) {
            $data = Fund::paginate(5);
            return view('user.partials.fund-search-item', compact('data'))->render();
        }
        if (!$query) {
            return response()->json(['error' => 'No query provided'], 400);
        }

        $results = Fund::where('name', 'LIKE', "%{$query}%")
                       ->orWhereHas('category', function ($q) use ($query) {
                           $q->where('catName', 'LIKE', "%{$query}%");
                       })
                       ->with(['category', 'fundDetail'])
                       ->get();

        return view('user.partials.fund-search-item', ['data' => $results])->render();
    }

    public function processFund(Request $request)
    {
        $request->validate([
            'fund_id' => 'required|exists:funds,id', // Ensure fund_id exists in the funds table
            'fundAmount' => 'required|numeric|min:10000',
        ]);

        $fundAmount = $request->input('fundAmount');
        $fund_id = $request->input('fund_id');

        $fund = Fund::find($fund_id);

        if ($fund) {
            $fund->currAmount += $fundAmount;
            $fund->save();

            FundHistory::create([
                'fund_id' => $fund_id,
                'amount' => $fundAmount,
                'funder_id' => auth()->id(),
            ]);
        }

        return redirect()->back()->with('message', "You have funded Rp" . number_format($fundAmount, 2));
    }

}
