<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
//    /**
//     * Index page
//     *
//     * @return RedirectResponse
//     */
//    public function index()
//    {
//        return redirect()->route('contacts.index');
//    }

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


