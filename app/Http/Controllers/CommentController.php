<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Replies;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'user_id' => 'required',
            'fund_id' => 'required',
            'comment' => 'required'
        ]);

        Comments::create([
            'user_id' => $request->user_id,
            'fund_id' => $request->fund_id,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Comment has been added!');
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
        $fund = Fund::findOrFail($id);

        $fund->delete();

        return redirect()->route('category.index')->with('success', 'Fund deleted successfully!');
    }

    public function reply(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'comments_id' => 'required',
            'replyText' => 'required'
        ]);

        Replies::create([
            'user_id' => $request->user_id,
            'comments_id' => $request->comments_id,
            'replyText' => $request->replyText
        ]);

        return redirect()->back()->with('success', 'Reply has been added!');
    }
}
