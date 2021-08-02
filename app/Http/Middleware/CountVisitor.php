<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;

class CountVisitor
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
        $ip = hash('sha512', $request->ip());
        $visitor = geoip()->getLocation($request->ip());
        if(Visitor::where('date', today())->where('encrypt', $ip)->count() < 1)
        {
            Visitor::create([
                'date' => today(),
                'encrypt' => $ip,
                'ip' => $visitor->ip,
                'iso' => $visitor->iso_code,
                'country' => $visitor->country,
                'city' => $visitor->city,
                'state' => $visitor->state,
                'state_name' => $visitor->state_name,
                'postal_code' => $visitor->postal_code,
                'lat' => $visitor->lat,
                'lon' => $visitor->lon,
            ]);
        }
        return $next($request);
    }
}
