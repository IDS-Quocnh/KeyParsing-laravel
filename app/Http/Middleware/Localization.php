<?php
namespace App\Http\Middleware;
use Closure;
use Session;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = Session::get('language', config('app.locale'));
        switch ($language) {
            case 'en':
                $language = 'en';
                break;

            case 'it':
                $language = 'it';
                break;
        }
        App::setLocale($language);

        return $next($request);
    }
}