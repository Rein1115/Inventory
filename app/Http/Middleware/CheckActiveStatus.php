<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
use Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckActiveStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            $data = DB::select('SELECT COUNT(*) as count FROM users WHERE `status` = "Active" AND id = ?', [Auth::user()->id]);
            $count = $data[0]->count ?? 0;
    
            if ($count > 0) {
     
                return $next($request);
            } else {
                return response()->view('page-error-404', [], 404);
            }
    }
}
