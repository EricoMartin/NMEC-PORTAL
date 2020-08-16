<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Staff;
use App\Role;
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
        $users = User::with('roles')->paginate(8);
        return view('admin.user_list', ["users" => $users]);
    }
    public function getStaff(){
        $staff = Staff::paginate(8);
        return view('admin.staff_list', ["staff" => $staff]);
    }
    public function getDeptStaff(){
        $dept= Staff::find(auth()->user()->id)->department;
        //dd($dept);
        $staff = Staff::where('department', $dept)->paginate(5);
        //dd($staff);
        return view('hod.staff_list', ["staff" => $staff]);
    }

    public function getUnitStaff(){
        $dept= Staff::find(auth()->user()->id)->unit;
        //dd($dept);
        $staff = Staff::where('unit', $dept)->paginate(5);
        //dd($staff);
        return view('headsunit.staff_list', ["staff" => $staff]);
    }
    public function getAStaff($id){
        $staff = Staff::where('id', $id)->get();
        return view('admin.staff_data', ["staff" => $staff]);
    }
    public function makeAdmin($id){
        $user = User::where('id', $id)->firstOrFail();
        $role = Role::where('name', 'admin')->firstOrFail();
        $user->roles()->attach($role->id);
        $user->role_id = 2;
        $user->save();
        return redirect()->back();

    }

    public function removeAdmin($id){
        $user = User::where('id', $id)->firstOrFail();
        $role = Role::where('name', 'admin')->firstOrFail();
        $user->roles()->detach($role->id);
        $user->role_id = null;
        $user->save();
        return redirect()->back();

    }
    
    public function makeHod($id){
        $user = User::where('id', $id)->firstOrFail();
        $role = Role::where('name', 'hod')->firstOrFail();
        $user->roles()->attach($role->id);
        $user->role_id = 1;
        $user->save();
        return redirect()->back();

    }
    public function removeHod($id){
        $user = User::where('id', $id)->firstOrFail();
        $role = Role::where('name', 'hod')->firstOrFail();
        $user->roles()->detach($role->id);
        $user->role_id = 1;
        $user->save();
        return redirect()->back();

    }
    public function makeUnitHead($id){
        $user = User::where('id', $id)->firstOrFail();
        $role = Role::where('name', 'unithead')->firstOrFail();
        $user->roles()->attach($role->id);
        $user->role_id = 3;
        $user->save();
        return redirect()->back();
    }
    public function removeUnitHead($id){
        $user = User::where('id', $id)->firstOrFail();
        $role = Role::where('name', 'unithead')->firstOrFail();
        $user->roles()->detach($role->id);
        $user->role_id = 1;
        $user->save();
        return redirect()->back();

    }
}
