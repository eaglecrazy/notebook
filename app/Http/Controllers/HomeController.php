<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Welcome
     *
     * @return Renderable|RedirectResponse
     */
    public function welcome()
    {
        if (Auth::user())
            return redirect()->route('contacts.index');
        return view('welcome');
    }
}


