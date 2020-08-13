<?php

namespace App\Http\Controllers;

use App\User;
use App\Staff;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;

class StaffController extends Controller
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
    //Controller methods
    public function getAllStaff() {
        // logic to get all staff goes here
        $staff = Staff::get()->toJson(JSON_PRETTY_PRINT);
        return response($staff, 200);
      }

      public function uploadAvie(Request $request){
          //logic to upload avatar
          $this->validate($request, [
            'avatar' => 'image|nullable|max:500',
            ]);

          if($request->hasFile('avatar')){
            //get filename with extension
              $filenamewithextension = $request->file('avatar')->getClientOriginalName();
              //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
              $path = $request->file('avatar')->storeAs('public/images', $filenametostore);
              Staff::find(auth()->user()->id)->update(['avatar' => $filenametostore]);
              $msg = 'Avatar uploaded successfully';
          }else{
            $msg = 'Upload not successful';
          }
        
        return redirect()->back()->with('success', $msg);
      }
  
      public function createStaff(Request $request) {
        // logic to create a staff record goes here
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'file_number' => 'required',
            'email' => 'required', 
            'dob' => 'required', 
            'state' => 'required', 
            'gender' => 'required', 
            'phone' => 'required', 
            'designation' => 'required',
            'grade_level' => 'required', 
            'location' => 'required', 
            'address' => 'required',
            'qualification' => 'required', 
            'discipline' => 'required', 
            'department' => 'required'
        ]);

        $staff = new Staff;
        $staff->username= auth()->user()->name;
        $staff->firstname = $request->firstname;
        $staff->lastname = $request->lastname;
        $staff->file_number = $request->file_number;
        $staff->avatar = 'placeholder-person-300x300.png';
        $staff->email = $request->email;
        $staff->dob = $request->dob;
        $staff->state = $request->state;
        $staff->gender = $request->gender;
        $staff->phone = $request->phone;
        $staff->designation = $request->designation;
        $staff->grade_level = $request->grade_level;
        $staff->location = $request->location;
        $staff->address = $request->address;
        $staff->qualification = $request->qualification;
        $staff->discipline = $request->discipline;
        $staff->department = $request->department;
        $staff->unit = $request->unit;
        $staff->middlename = $request->middlename;
        $staff->user_id = auth()->user()->id;
        if (Staff::where('id', $staff->user_id)->exists()) {
            return response()->json([
                "message" => "Staff data already exists"
              ], 404);
        } else{
        $staff->save();

    response()->json([
        "staff" => $staff,
        "message" => "Staff data record created"
    ], 201);
      } 
      return view('home', compact($staff));       
    }
  
      public function getStaff($id) {
        // logic to get a staff record goes here
        if (Staff::where('id', $id)->exists()) {
            $staff = Staff::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($staff, 200);
          } else {
            return response()->json([
              "message" => "Staff data not found"
            ], 404);
          }
      }
  
      public function updateStaff(Request $request, $id) {
        // logic to update a staff record goes here
        if (Staff::where('id', $id)->exists()) {
            $staff = Staff::find($id);
            $staff->firstname = is_null($request->firstname) ? $staff->firstname : $request->firstname;
            $staff->lastname = is_null($request->lastname) ? $staff->lastname : $request->lastname;
            $staff->file_number = is_null($request->file_number) ? $staff->file_number : $request->file_number;
            $staff->avatar = is_null($request->avatar) ? $staff->avatar : $request->avatar;
            $staff->email = is_null($request->email) ? $staff->email : $request->email;
            $staff->dob = is_null($request->dob) ? $staff->dob : $request->dob;
            $staff->state = is_null($request->state) ? $staff->state : $request->state;
            $staff->gender = is_null($request->gender) ? $staff->gender : $request->gender;
            $staff->phone = is_null($request->phone) ? $staff->phone : $request->phone;
            $staff->designation = is_null($request->designation) ? $staff->designation : $request->designation;
            $staff->grade_level = is_null($request->grade_level) ? $staff->grade_level : $request->grade_level;
            $staff->location = is_null($request->location) ? $staff->location : $request->location;
            $staff->address = is_null($request->address) ? $staff->address : $request->address;
            $staff->qualification = is_null($request->qualification) ? $staff->qualification : $request->qualification;
            $staff->discipline = is_null($request->discipline) ? $staff->discipline : $request->discipline;
            $staff->department = is_null($request->department) ? $staff->department : $request->department;
            $staff->unit = is_null($request->unit) ? $staff->unit : $request->unit;
            $staff->middlename = is_null($request->middlename) ? $staff->middlename : $request->middlename;
            $staff->save();
    
            return response()->json([
                "data" => $staff,
                "message" => "Records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Staff data not found"
            ], 404);
            
        }
      }
  
      public function deleteStaff ($id) {
        // logic to delete a staff record goes here
        if(Staff::where('id', $id)->exists()) {
            $staff = Staff::find($id);
            $staff->delete();
    
            return response()->json([
              "message" => "Staff record deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Staff data not found"
            ], 404);
          }
      }
}
