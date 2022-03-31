<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // Cette fonction permet d'intercepter toutes les requetes entrantes
    // Les middlewares agissent au niveau des routes
    public function handle(Request $request, Closure $next)
    {
        // si la logique utiliser dans la gate renvoi true, ca veut dire qu'il s'agit d'un admin
        // on laisse passer la requete
        if (Gate::allows("admin")) {
            return $next($request);
        }
        // Dans le cas contraire l'utilisateur sera rediriger vers la route home
        return redirect()->route("home");
    }
}
