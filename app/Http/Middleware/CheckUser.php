<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Review;
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
            if($uri == 'contact' || $uri == 'product/cart/store/' . $request->route('id') || $uri == 'product/cart/delete/' . $request->route('id') || $uri== 'cart' || $uri== 'checkout' || $uri== 'order' || ( $request->route('id') && ( $uri == 'blog/store/review/' . $request->route('id') || $uri == 'product/store/review/' . $request->route('id') || $uri == 'blog/add/like/' . $request->route('id') || ($request->route('id') && Review::find($request->route('id')) && Auth::user()->id == Review::find($request->route('id'))->user_id &&  $uri == 'delete/review/' . $request->route('id'))) ) ){
                return $next($request);
            }
            if (Auth::user()->role_id == 1) {
                return $next($request);
            }
            else if(Auth::user()->role_id == 2){
                if($uri == 'backoffice/create/blog' || $uri == 'backoffice/blogs' || $uri == 'backoffice/validation/blogs' || $uri == 'backoffice' || $uri == 'store/blog' || $uri == 'delete/blog/' . $request->route('id') || $uri == 'update/blog/' . $request->route('id') || $uri == 'blog/validate/' . $request->route('id') || $uri == 'backoffice/edit/blog/' . $request->route('id')){
                    return $next($request);
                }
                else{
                    return redirect()->back()->with('warning',"Vous n'avez pas accès à cette action");
                }
            }
            else if(Auth::user()->role_id == 3){
                if($uri == 'store/blog' || $uri == 'backoffice/create/blog' || $uri == 'backoffice' || $uri == 'backoffice/blogs' || ( $request->route('id') && Auth::user()->id == Blog::find($request->route('id'))->user_id && ( $uri == 'backoffice/edit/blog/' . $request->route('id') || $uri == 'delete/blog/' . $request->route('id')) || $uri == 'update/blog/' . $request->route('id'))){
                    return $next($request);
                }
                else{
                    return redirect()->back()->with('warning',"Vous n'avez pas accès à cette action");
                }
            }
            else if(Auth::user()->role_id == 4){
                if( $uri == 'backoffice' || $uri == 'backoffice/products' || $uri == 'create/product' || $uri == 'delete/product/' . $request->route('id') || $uri == 'update/product/' . $request->route('id') || $uri == 'backoffice/category/' . $request->route('id') || $uri == 'edit/product/' . $request->route('id') || $uri == 'store/product'){
                    return $next($request);
                }
                else{
                    return redirect()->back()->with('warning',"Vous n'avez pas accès à cette action");
                }
            }
            else{
                return redirect()->back()->with('danger',"Vous n'avez pas accès à cette action");
            }
      

        }
        else{
            return redirect()->back()->with('warning',"Vous devez etre connecté");
        }
    }
}
