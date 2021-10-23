<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EntrepriseAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has("entreprise")){
            return redirect()->route("entreprise.connexion")->with("error-auth-required","Vous devez vous authentifier pour acceder à cette page");
        }
        return $next($request);

    }
}
