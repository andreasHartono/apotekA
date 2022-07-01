<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @param  string|null  $guard
    * @return mixed
    */
   public function handle($request, Closure $next, $guard = null)
   {
      if (Auth::guard($guard)->check()) {
         $role = Auth::user()->sebagai;
         switch ($role) {
            case 'owner':
               return '/suppliers';
               break;
            case 'pegawai':
               return '/medicines';
               break;
            case 'member':
               return '/checkout';
               break;
            default:
               return '/';
               break;
         }
      }

      return $next($request);
   }
}