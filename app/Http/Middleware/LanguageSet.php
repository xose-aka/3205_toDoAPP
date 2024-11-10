<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class LanguageSet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $localePrefix = $request->segment(1);

        $sessionLocale = Session::get('locale');

        if (is_null($sessionLocale)) {
            if (is_null($localePrefix)) {



            } else {
                $availableLanguages = Language::query()->pluck('code')->toArray();

                if (in_array($localePrefix, $availableLanguages)) {
                    Session::put('locale', $localePrefix);
                    app()->setLocale($localePrefix);
                }
            }
        } else {
            app()->setLocale($sessionLocale);
        }



//        $locale = app()->getLocale();
//
//        $sessionLocal = Session::get('locale', app()->getLocale());
//
//        if ($locale !== $sessionLocal) {
//            Session::put('locale', $locale);
//        }
//
//        $language = Language::query()->where('code', $locale)->first();
//
//        if (!is_null($language))
//            session()->put('language_id', $language->id);

        return $next($request);
    }
}
