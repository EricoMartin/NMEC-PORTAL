<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Staff;
use DB;

class AdminController extends Controller
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
        $messages = DB::table('messages')->where('staff_id', auth()->user()->id)->get();
        return view('admin.admin')->with('messages', $messages);
    }
    public function getUsers(){
        $users = User::with('roles')->get();
        return view('admin.user_list', ["users" => $users]);
    }
    public function getStaff(){
        $staff = Staff::get();
        return view('admin.staff_list', ["staff" => $staff]);
    }
    public function getAStaff($id){
        $staff = Staff::where('id', $id)->get();
        return view('admin.staff_data', ["staff" => $staff]);
    }
}
