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

        $this->validate($request, [
            'staff_id' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        // dd($request);
        if($request->hasFile('filename')){
            $this->validate($request, [
                'filename' => 'required|max:1999|mimes:doc,pdf,docx,txt,zip,jpg,png'
            ]);
            //get filename with extension
              $filenamewithextension = $request->file('filename')->getClientOriginalName();
              //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('filename')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('filename')->storeAs('public/files', $filenametostore);
        }else{
            $filenametostore = NULL;
        } 
        $reply = new Reply;
        $reply->message = $request->message;
        $reply->subject = $request->subject;
        $reply->staff_id = $request->staff_id;
        $reply->user_id = $request->user()->id;
        $reply->msg_id = $request->msg_id;
        $reply->filename = $filenametostore;
        $message = Message::find($request->msg_id);
        $reply->save();
        $message->replies()->save($reply);
        return redirect('/'.$message->id.'/message');
    }
}
