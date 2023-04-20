<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin.companies.index');
            } else {
                return redirect('admin.companies.index')->with('message', ' access denied as you are not admin!');
            }
        } else {
            return redirect('companies.index')->with('message', 'login to access the website info');
        }
        // return $next($request);
    }
}
