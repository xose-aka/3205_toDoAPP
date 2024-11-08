<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class BaseController extends Controller
{
    public function __construct()
    {
        // Share session data globally for all views
        Inertia::share([
            'session' => function () {
                return session()->all(); // Share all session data
            },
        ]);
    }
}
