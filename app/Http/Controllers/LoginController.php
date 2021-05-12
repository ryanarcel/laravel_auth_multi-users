<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('username', 'password');

        $users = DB::table('users')->where('username', $request->username)->get("rank"); // gets data from table users where username match

        $rank;
        foreach($users as $user){
            $rank = $user->rank;                        // get the rank of the username. Either 'admin' or 'staff'
        }

        if (Auth::attempt($credentials)) {

            $request->session()->put('rank', $rank);    // put session data named 'rank'. Which value is either 'admin' or 'staff'

            return redirect()->route('admin-home');
        }
        
        return back()->withErrors([
            "Invalid Login"
        ]);

    }

    public function loginStaff(Request $request){
        $credentials = $request->only('username', 'password');

        $users = DB::table('users')->where('username', $request->username)->get("rank");

        $rank;
        foreach($users as $user){
            $rank = $user->rank;
        }
        
        if (Auth::attempt($credentials)) {
            $request->session()->put('rank', $rank);
            return redirect()->route('staff-home');
        }
        
        return back()->withErrors([
            "Invalid Login"
        ]);
    }
}
