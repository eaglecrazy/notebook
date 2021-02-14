<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Services\ContactService;
use App\User;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ContactController extends Controller
{
    private ContactService $contactService;

    /**
     * Constructor
     * @param ContactService $cs
     */
    public function __construct(ContactService $cs)
    {
        $this->contactService = $cs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $contacts = $user->contacts;
        $favorites = $user->favorites;
        return view('home', compact('user', 'contacts', 'favorites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        dd('store');
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return Renderable
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        dd('destroy');
    }

    /**
     * Toggle favorited state
     *
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function toggleFavoritedState(Contact $contact)
    {
        try {
            $this->contactService->toggleFavoritedState($contact);
        } catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }
        return redirect()->back();
    }
}
