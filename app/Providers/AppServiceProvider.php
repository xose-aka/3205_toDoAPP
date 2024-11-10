<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        dd(app()->getLocale());
//        $language = Language::query()->where('code', $locale)->first();
//
//        if (!is_null($language))
//            session('language_id', $language->id);

    }
}
