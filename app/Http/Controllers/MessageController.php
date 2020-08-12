<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Message;
use App\User;
use App\role;
use DB;

class MessageController extends Controller
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
    public function index(){
        return view('pages.message');
    }

    public function getMessages($id){
        $messages = DB::table('messages')->where('staff_id', $id)->get();
        //dd($messages[0]);
        return view('pages.showmsg')->with('messages', $messages);
    }

    public function getAMessage($id){
        $messages_data = Message::where('id', $id)->get();
        $messages = $messages_data[0];
        return view('pages.viewmsg')->with('messages', $messages);
    }

    public function editMessage($id){
      $messages_data = Message::where('id', $id)->get();
      //dd($messages_data[0]);
      $message = $messages_data[0];
      return view('pages.editmsg')->with('message', $message);
    }

    public function updateMessage(Request $request, $id){
      $this->validate($request, [
        'file_number' => 'required',
        'subject' => 'required',
        'message' => 'required',
        'filename' => 'nullable|max:1999|mimes:doc,pdf,docx,txt,zip,jpg,png'
    ]);

     if($request->hasFile('filename')){
        
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
    $staff_data = DB::table('staff')->where('file_number', $request->file_number)->get();
    //dd($staff);
    $staff =$staff_data[0];
    $message = Message::find($id);
    $message->filename = $filenametostore;
    $message->staff_id =  $staff->id;
    $message->user_id = auth()->user()->id;
    $message->subject = $request->subject;
    $message->message = $request->message;
    $message->save();

    return redirect('/'.$message->id.'/message')->with('success', 'Message updated successfully');
    }


    public function sendMessage(Request $request){
        $this->validate($request, [
            'file_number' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'filename' => 'required|max:1999|mimes:doc,pdf,docx,txt,zip,jpg,png'
        ]);

         if($request->hasFile('filename')){
            
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
        $staff_data = DB::table('staff')->where('file_number', $request->file_number)->get();
        //dd($staff);
        $staff =$staff_data[0];
        $message = new Message();
        $message->filename = $filenametostore;
        $message->staff_id =  $staff->id;
        $message->user_id = auth()->user()->id;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        return redirect('/inbox')->with('success', 'Message sent successfully');
    }

/*     public function sendAdminMessage(Request $request){
        $this->validate($request, [
            'department' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'filename' => 'required|max:1999|mimes:doc,pdf,docx,txt,zip,jpg,png'
        ]);

         if($request->hasFile('filename')){
            
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
        $staffid = Staff::where('role_id', 2 )->orderBy('name')->pluck('name', 'role_id');
        $staff_data = DB::table('staff')->where('department', $request->department)->get();
        dd($staffid);
        $staff =$staff_data[0];
        $message = new Message();
        $message->filename = $filenametostore;
        $message->staff_id =  $staff->id;
        $message->user_id = auth()->user()->id;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        return redirect('/inbox')->with('success', 'Message sent successfully')->with( 'staff_id', $staffid);
    } */

    public function deleteMessage($id){
        $messages_data = Message::where('id', $id)->get();
        $message = $messages_data[0];
        $message->delete();
        return redirect('/'.auth()->user()->id.'/inbox')->with('success', 'Message deleted successfully');
    }
}
