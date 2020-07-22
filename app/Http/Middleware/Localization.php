<?php
namespace App\Http\Middleware;
use Closure;
use Session;
use App;

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
        $language = Session::get('language');
        if (auth()->user()) {
            $language = auth()->user()->default_language;
        }
        switch ($language) {
            case 'Italian':
                $language = 'it';
                break;
            case 'it':
                $language = 'it';
                break;
            default:
                $language = 'en';
                break;
        }
        App::setLocale($language);

        return $next($request);
    }
}