<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class DelayEveryFifthRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve the number of requests made by this session
        $requestCount = Session::get('request_count', 0);


        // Increment the request count
        $requestCount++;

        // Save the updated request count in the session
        Session::put('request_count', $requestCount);


        // Check if it's every fifth request
        if ($requestCount % 5 === 0) {
            // Add a 5-second delay for every fifth request
            sleep(5);
        }

        return $next($request);
    }
}
