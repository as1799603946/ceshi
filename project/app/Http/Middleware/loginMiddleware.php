<?php

namespace App\Http\Middleware;

use Closure;

class loginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {	
    		//这个文件没用可以删掉
	    	if(session('isadmin')){
	            return $next($request);
	        } else {
	            return redirect('/adminlogin');
	        }
    
    }
}
