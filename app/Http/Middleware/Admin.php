<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Flash;
use Closure;

class Admin
{
    protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->rol!='admin'){
            Flash::warning('Debe ingresar con un perfil de administrador');
            return redirect()->guest('home');
        }

        return $next($request);
    }
}
