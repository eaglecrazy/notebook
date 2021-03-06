<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Services\ContactService;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        return view('contacts.index', compact('user', 'contacts', 'favorites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function store(ContactRequest $request)
    {
        $data = $request->only(['name', 'phone', 'favorited']);
        try {
            $this->contactService->store($data);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return Renderable
     */
    public function show(Contact $contact)
    {
        $this->checkAccess($contact);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return Renderable
     */
    public function edit(Contact $contact)
    {
        $this->checkAccess($contact);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactRequest $request
     * @param Contact $contact
     * @return Renderable|RedirectResponse
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $this->checkAccess($contact);
        $data = $request->only(['name', 'phone', 'favorited']);
        try {
            $this->contactService->update($contact, $data);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function destroy(Contact $contact)
    {
        $this->checkAccess($contact);
        try {
            $this->contactService->destroy($contact);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->route('contacts.index');
    }

    /**
     * Toggle favorited state
     *
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function toggleFavoritedState(Contact $contact)
    {
        $this->checkAccess($contact);
        try {
            $this->contactService->toggleFavoritedState($contact);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Check access to contact
     *
     * @param Contact $contact
     */
    private function checkAccess(Contact $contact): void
    {
        if (!Gate::allows('manage-own-contacts', $contact)) {
            abort(403);
        }
    }
}
