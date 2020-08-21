<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Message;
use App\User;
use App\role;
use Auth;
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

    public function search(Request $request){
        $search = $request->get('search');
        $staff = DB::table('staff')->where('file_number', 'like', '%'.$search.'%')->paginate(5);
        $stafffirstname = DB::table('staff')->where('firstname', 'like', '%'.$search.'%')->paginate(5);
        $stafflastname = DB::table('staff')->where('lastname', 'like', '%'.$search.'%')->paginate(5);
        return view('pages.stafflist')->with(['staff'=> $staff, 'stafffirstname' => $stafffirstname, 'stafflastname' => $stafflastname]);
    }
    public function staffMessage($id){
        $staff = Staff::find($id);
        return view('pages.msg', compact('staff', $staff));
    }

    public function getMessages($id){
        $messages = DB::table('messages')->where('staff_id', $id)->paginate(5);
        $msg = DB::table('messages')->where('user_id', $id)->paginate(5);
        
        
        //dd($messages[0]);
        return view('pages.showmsg')->with(['messages' => $messages, 'msg' => $msg]);
    }

    public function getSentMessages($id){
        $msg = DB::table('messages')->where('user_id', $id)->paginate(5);
        //dd($messages[0]);
        return view('pages.sentmsg')->with('msg', $msg);
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
            
        ]);

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

    public function hodIndex($id){
        $staff_data = Staff::where('id', $id)->get();
        //dd($user[0]);
        $staff = $staff_data[0];
        return view('hod.msg', compact('staff', $staff));
    }

     public function hodMessage(Request $request){
        $this->validate($request, [
            'file_number' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'department'=> 'required'
        ]);

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
        $staff_data = DB::table('staff')->where('file_number', $request->file_number)->get();
        
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

    public function deleteMessage($id){
        $messages_data = Message::where('id', $id)->get();
        $message = $messages_data[0];
        $message->delete();
        return redirect('/'.auth()->user()->id.'/inbox')->with('success', 'Message deleted successfully');
    }
}
