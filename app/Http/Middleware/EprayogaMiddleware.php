<?php
namespace App\Http\Middleware;
use Closure;
use Cookie;
use Log;

class EprayogaMiddleware
{
    public function handle($request, Closure $next)
    {	$user = $request->session()->get('user_login_id');
    	if(!is_null($user)){
    		return $next($request);
    	}else{
    		return response('redirect', 301)->withCookie(Cookie::forget('user_profile_id'));
    	
    	}
        
    }
}

?>