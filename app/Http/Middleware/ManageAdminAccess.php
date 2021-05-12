<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManageAdminAccess
{

    public function handle(Request $request, Closure $next)
    {
        $rank = $request->session()->get('rank');

        if($rank == "staff"){
            return redirect()->route("staff-home");
        }
        return $next($request);
    }
}
