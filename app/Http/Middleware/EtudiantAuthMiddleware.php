<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EtudiantAuthMiddleware
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
        if(!session()->has("etudiant")){
            return redirect()->route("etudiant.connexion")->with("error-auth-required","Vous devez vous authentifier pour acceder à cette page");
        }
        return $next($request);
    }
}
