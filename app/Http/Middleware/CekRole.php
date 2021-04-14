<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $RoleNames)
    {
        $results = ($request->session()->has('role'));
        if( $results == false){
            return redirect(url('/pengguna/login'));
        }
            if ($request->session()->get('role') == $RoleNames) {
                return $next($request);
            } 
            else
            {
                return abort(503, 'Anda tidak memiliki hak akses');
            }   
    }


}
