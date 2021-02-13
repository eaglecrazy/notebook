<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /**
         * @var User $user ;
         */
        $user = Auth::user();
//        $contacts = $user->contacts;

//        $contacts = DB::table('user_contacts')->
//            where('user_contacts.user_id', $user->id)->
//            join('contacts', 'user_contacts.contact_id', 'contacts.id')
//            ->select('contacts.name', 'contacts.phone', 'user_contacts.favorite_contact')
//            ->get();

        dd($contacts);
        return view('home', compact('user', 'contacts'));
    }
}
