<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {

        if($request->user()->profile_id != $role){
            switch ($request->user()->profile_id) {
                case 1:
                    return redirect()->route('admin.dashboard');
                break;
                case 3:
                    return redirect()->route('school.dashboard');
                break;
                case 5:
                    return redirect()->route('student.dashboard');
                break;
            }
        }

        return $next($request);
    }
}