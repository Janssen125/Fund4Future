<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\FundDetail;
use App\Models\FundHistory;
use App\Models\Comments;
use App\Models\Chat;
use App\Models\ActivityLog;
use App\Models\GoogleToken;
use Illuminate\Support\Facades\Storage;
use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive\Permission;

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
    public function store(Request $request, GoogleClientController $google)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'targetAmount' => 'required',
            'fund_details' => 'required|array',
            'fund_details.*.types' => 'required',
            'fund_details.*.imageOrVideo' => 'required|file',
        ]);

        $fund = Fund::create([
            'name' => $request->name,
            'description' => $request->description,
            'owner_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'currAmount' => 0,
            'targetAmount' => $request->targetAmount,
        ]);

        foreach ($request->fund_details as $detail) {

            $fileUrl = null;

            if (isset($detail['imageOrVideo']) && $detail['imageOrVideo']->isValid()) {
                // CALL GOOGLE CLIENT CONTROLLER
                $fileUrl = $google->uploadToDrive($detail['imageOrVideo']);
            }

            FundDetail::create([
                'fund_id'      => $fund->id,
                'types'        => $detail['types'],
                'imageOrVideo' => $fileUrl,
            ]);
        }

        Chat::create([
            'fund_id' => $fund->id,
            'funder_id' => auth()->id(),
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity_type' => 'create',
            'description' => "Created a new fund detail for fund ID: {$fund->id}",
            'created_at' => now(),
        ]);

        return redirect()->route('profileFundingList')->with('message', 'Fund added successfully!');
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
            'fund_id' => 'required|exists:funds,id',
            'fundAmount' => 'nullable|numeric|min:10000',
            'customAmount' => 'nullable|numeric|min:10000',
        ]);

        $fundAmount = $request->customAmount ?? $request->fundAmount;

        if (!$fundAmount) {
            return redirect()->back()->with('error', 'Please select or enter a valid amount.');
        }

        $user = auth()->user();

        if($user->balance < $fundAmount) {
            return redirect()->back()->with('error', 'Insufficient balance.');
        }

        $user->balance -= $fundAmount;
        $user->save();

        $fund = Fund::find($request->fund_id);

        if ($fund) {
            $fund->currAmount += $fundAmount;
            $fund->save();

            FundHistory::create([
                'fund_id' => $fund->id,
                'amount' => $fundAmount,
                'funder_id' => auth()->id(),
            ]);
        }

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity_type' => 'User Fund',
            'description' => auth()->id() . "funds to fund ID: {$fund->id}",
            'created_at' => now(),
        ]);



        return redirect()->back()->with('message', "You have funded Rp" . number_format($fundAmount, 2));
    }

}
