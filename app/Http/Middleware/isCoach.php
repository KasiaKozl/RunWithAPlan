<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class isCoach {


//Middleware to check specific role and return adequate home view
  public function handle($request, Closure $next) {
    if (auth()->user()->roles){
      foreach(auth()->user()->roles as $role){
        if($role->id == '1'){
          return $next($request);
        }
      }
      return redirect()->route('home');
      }
    }
}
