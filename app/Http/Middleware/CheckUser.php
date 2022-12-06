<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        $uri = $request->path();
        
        if(Auth::check()){
            if (Auth::user()->role_id == 1) {
                return $next($request);
            }
            else if(Auth::user()->role_id == 2){
                if($uri == 'backoffice/create/blog' || $uri == 'backoffice/blogs' || $uri == 'backoffice/validation/blogs' || $uri == 'backoffice' || $uri == 'store/blog' || $uri == 'delete/blog/' . $request->route('id') || $uri == 'update/blog/' . $request->route('id') || $uri == 'blog/validate/' . $request->route('id') || $uri == 'backoffice/edit/blog/' . $request->route('id')){
                    return $next($request);
                }
                else{
                    return redirect()->back()->with('warning',"Vousn'avez pas acces");
                }
            }
            else if(Auth::user()->role_id == 3){

            }
            else if(Auth::user()->role_id == 4){

            }
            else if(Auth::user()->role_id == 5){

            }

        }
        else{
            return redirect()->back()->with('warning',"Vous devez etre connecté");
        }
    }
}
