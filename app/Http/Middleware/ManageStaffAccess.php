<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManageStaffAccess
{

    public function handle(Request $request, Closure $next)
    {
        $rank = $request->session()->get('rank');

        if($rank == "admin"){
            return redirect()->route("admin-home");
        }
        return $next($request);
    }
}
