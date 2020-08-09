<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;

class ResetPasswordController extends Controller
{
    public function create()
    {
    	return view('admin.reset_password');
    }

    public function store(Request $request)
    {
    	 $request->validate([
          'current_password' => 'required',
          'new_password' => 'required|string|min:8|same:confirm_password',
          'confirm_password' => 'required',
          'status' => 'required',
        ]);

    	$user = \Auth::user();

    	if (!\Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }

        $user->password = \Hash::make($request->new_password);
        $user->status = $request->status;

        $user->save();

         return view('/home')->with('success', 'Password successfully changed!');
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
}
