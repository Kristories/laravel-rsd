<?php

namespace Kristories\Rsd;

use Closure;
use Kristories\Rsd\Rsd;

class Rsd
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
        $driver    = config('reserved-subdomains.driver');
        $host      = $request->getHost();
        $subdomain = explode('.', $host)[0];

        if ($driver == 'array') {
            $subdomains = config('reserved-subdomains.subdomains');

            if (in_array($subdomain, $subdomains)) {
                return $next($request);
            }
        } elseif ($driver == 'database') {
            $modelName = config('reserved-subdomains.model');
            $model     = new $modelName;

            if (!in_array('Kristories\Rsd\ReservableTrait', class_uses($model))) {
                throw new \Exception('Kristories\Rsd\ReservableTrait not found!');
            }

            dd($model->reserved($subdomain)->count());

            if ($model::count()) {
                return $next($request);
            }
        }

        return abort(404);
    }
}
