<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use App\Models\Language;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class TodoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Todo/Index', [
            'todos' => TodoResource::collection(Todo::query()->has('getTranslation')->get())->resolve(),
            'availableLanguages' => Language::all(),
            'currentLocale' => Session::get('locale', app()->getLocale()),
        ]);
    }


    public function about()
    {
        return Inertia::render('About/Index', [
            'availableLanguages' => Language::all(),
            'currentLocale' => Session::get('locale', app()->getLocale()),
        ]);
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
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
