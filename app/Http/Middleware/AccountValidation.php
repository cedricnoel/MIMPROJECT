<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccountValidation
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
        // Si le compte de l'utilisateur a été validé
        if (Auth::user()->is_valid == true) {
            //
            return $next($request);
        // Sinon
        } else {
            // On le redirige vers la page d'attente
            return redirect('/waiting');
        }
    }
}
