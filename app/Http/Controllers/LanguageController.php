<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends BaseController
{

    /**
     * @param $locale
     * @return RedirectResponse
     */
    public function changeLanguage($locale): RedirectResponse
    {
        $availableLanguages = Language::query()->pluck('code')->toArray();

        // Check if the language exists in the languages table
        if (in_array($locale, $availableLanguages)) { // add other languages as needed
            Session::put('locale', $locale);
            app()->setLocale($locale);

            // Get the previous URL and replace the locale prefix
            $previousUrl = url()->previous();
            $parsedUrl = parse_url($previousUrl);

            // Extract the path from the previous URL
            $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '/';

            // Remove the old locale from the URL path if present
            $segments = array_filter(explode('/', $path));
            if (in_array($segments[1] ?? '', $availableLanguages)) {
                array_shift($segments); // Remove the first segment if it's a locale
            }

            // Prepend the new locale to the segments
            array_unshift($segments, $locale);

            // Build the new URL with the locale prefix
            $newUrl = url(implode('/', $segments));

            // Redirect to the new URL
            return Redirect::to($newUrl);
        }

        return Redirect::back();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        //
    }
}
