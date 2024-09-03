<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class VagaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->tipo === 'empresa') {
            return $next($request);
        }

        return redirect()->route('')->withErrors(['access' => 'Você não tem permissão para acesssar esta pagina']);
    }
}
