<?php
namespace App\Http\Middleware;
use App\User;
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
            if($language == null){
                $language = auth()->user()->default_language;
            }else{

                $user = User::find(auth()->user()->id);
                switch ($language) {
                    case 'it':
                    case 'Italian':
                        $user->default_language = "Italian";
                        break;
                    default:
                        $user->default_language = "English";
                        break;
                }
                $user->save();
            }
        }

        switch ($language) {
            case 'it':
            case 'Italian':
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