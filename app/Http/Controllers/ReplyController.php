<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Reply;

class ReplyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index($id){
        $messages_data = Message::where('id', $id)->get();
        $messages = $messages_data[0];
        return view('pages.showreply')->with('messages', $messages);
    }
    public function store(Request $request)
    {
        $reply = new Reply;
        $reply->message = $request->message;
        $reply->subject = $request->subject;
        $reply->staff_id = $request->staff_id;
        $reply->user_id = $request->user()->id;
        $reply->msg_id = $request->msg_id;
        $message = Message::find($request->msg_id);
        $reply->save();
        $message->replies()->save($reply);
        return redirect('/'.$message->id.'/message');
    }
}
