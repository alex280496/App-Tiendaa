<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
      if(!auth()->user()->admin){//para acceder a los datos del usuario al compo admin
        return redirect('/');//si no es administrador redirige a la vista login
      }

        return $next($request);
    }
}
