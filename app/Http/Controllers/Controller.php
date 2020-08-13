<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use View;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    
    public function __construct()
    {
        $this->middleware(
            function ($request, $next) {
                $this->id = Auth::user()->id;
                View::share('role', auth()->user()->role->name ?? "Guest");
                
                return $next($request);
            }
        );
//        dd(auth()->user());
    }
}
