<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
use Illuminate\Support\Facades\Mail as MailFacade;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = Mail::all();
        return view('admin.mail', compact('mails'));
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'sender_id' => 'required',
        ]);
        Mail::create([
            'title' => $request->title,
            'content' => $request->content,
            'sender_id' => $request->sender_id,
        ]);
        return redirect()->back()->with('success', 'Mail sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mail = Mail::with('user')->findOrFail($id);
        return view('admin.mailDetail', compact('mail'));
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
        $mail = Mail::findOrFail($id);

        if($mail) {
            $mail->delete();
            return redirect()->route("mail.index")->with('message', "Delete Mail Successful");
        }
        return redirect()->route("mail.index")->with('message', "Failed to find ID");
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $mail = Mail::findOrFail($id);
        $mail->update([
            'status' => 'replied',
            'readBy' => auth()->user()->name,
        ]);

        MailFacade::to($mail->user->email)->send(new \App\Mail\ReplyMail($request->title, $request->content));

        return redirect()->route('mail.index')->with('message', 'Reply sent successfully');
    }
}
