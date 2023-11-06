<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClientAuthorizationMiddleware
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
        if($request->route()->parameters){
        $id = $request->route()->parameters['id'];
        $role = Auth::user()->roles->first()->name;
        $records = User::where('id','!=',Auth::user()->id)
                    ->where('id', $id);
                    if($role=='Client'){
                        $records->where('client_id', Auth::user()->client_id);
                       } 
                       elseif($role=='Producer') {
                            $records->whereHas('roles', function ($query) {
                                $query->where('client_id', Auth::user()->client_id)->where('name', 'Client');
                            });
                        
                       }
                       $records = $records->get();
                       $new_array = $records->toArray();
        if(count($new_array)==0) {
            // abort(403, 'Unauthorized');
            return redirect('/chat')->with('message', 'Sorry, User Not Found!');
        }
        return $next($request);
        } else {
        return $next($request);
        }
    }
}
