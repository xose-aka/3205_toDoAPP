<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class BaseController extends Controller
{
    public function __construct()
    {
        $locale = Session::get('locale', app()->getLocale());

        Inertia::share([
            'aboutIndexUrl' => route('about.index', ['locale' => $locale]),
            'translations' => function () {
                // Return the translations for the current locale
                return [
                    'home' => ucfirst(__('messages.home')),
                    'about' => ucfirst(__('messages.about')),
                    'software_engineer' => ucfirst(__('messages.software_engineer')),
                    'todo_list' => ucfirst(__('messages.todo_list')),
                ];
            }
        ]);
    }

}
