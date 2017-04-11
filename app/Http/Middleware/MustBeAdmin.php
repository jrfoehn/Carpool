<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;


class MustBeAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

    public function handle($request, Closure $next)
    {
        if ($request->user() != null)
        {
            if ($request->user()->admin == '1' )
            {
                return $next($request);
            }
        }

        return "Erreur: cette page est réservée aux administrateurs !";
    }


}
