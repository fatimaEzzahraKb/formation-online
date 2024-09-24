<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TraineeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        if($request->user() && $request->user()->permission  ==="stagiaire"){
        return $next($request);}
        elseif($request->user() && $request->user()->permission  ==="admin" || $request->user()->permission  ==="super_admin"){
            return response()->route('admin');
        }
        else {
            return response()->view('notfound',[],403);
            
        }
    }
}
