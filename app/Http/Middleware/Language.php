<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;

class Language
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
    //    // Check if the first segment matches a language code
        if (!array_key_exists($request->segment(1), config('translatable.locales')) ) {

            // Store segments in array
            $segments = $request->segments();

            // Set the default language code as the first segment
            $segments = \Arr::prepend($segments, config('app.fallback_locale'));
            // dd($segments);
            // Redirect to the correct url
            return redirect()->to(implode('/', $segments));
        }
        return $next($request);
        // if (Session()->has('applocale') && array_key_exists(Session()->get('applocale'), config('languages'))) {
        //     // Store segments in array
        //     $segments = $request->segments();

        //     // Set the default language code as the first segment
        //     $segments = \Arr::prepend($segments, config('app.fallback_locale'));
        //     // dd($segments);
        //     // Redirect to the correct url
        //     return redirect()->to(implode('/', $segments));
        //     // App::setLocale(Session()->get('applocale'));
        // }
        // else { // This is optional as Laravel will automatically set the fallback language if there is none specified
        //     App::setLocale(config('app.fallback_locale'));
        // }
        // return $next($request);
    }
}
