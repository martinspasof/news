<?php

namespace App\Http\Middleware;
use App\Models\Languages;

use Closure;
use Session;
use Config;


class SetLocale
{
    /**
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            $locale = Languages::where('default_lang', 1)->first()->lang;
        }

        app()->setLocale($locale);

        return $next($request);
    }
}