<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class BaseController extends Controller
{
    public function __construct()
    {
//        $locale = Session::get('locale', app()->getLocale());
//
//        Inertia::share([
//            'availableLanguages' => Language::all(), // assuming a Language model
//            'currentLocale' => $locale,
//        ]);
    }

}
