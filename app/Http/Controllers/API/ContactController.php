<?php

namespace App\Http\Controllers\API;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Services\ContactService;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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
     * Return a listing of the contacts.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $user = Auth::user();
        $contacts = $user->contacts;
        $favorites = $user->favorites;
        return response()->json(['contacts' => $contacts, 'favorites' => $favorites], 200);
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param ContactRequest $request
     * @return JsonResponse
     */
    public function store(ContactRequest $request)
    {
        $data = $request->only(['name', 'phone', 'favorited']);
        try {
            $contact = $this->contactService->store($data);
        } catch (Exception $e) {
            abort(500);
        }
        return response()->json(['contact' => $contact], 200);
    }

    /**
     * Display the specified contact.
     *
     * @param Contact $contact
     * @return JsonResponse
     */
    public function show(Contact $contact)
    {
        return response()->json(['contact' => $contact], 200);
    }


    /**
     * Update the specified contact in storage.
     *
     * @param ContactRequest $request
     * @param Contact $contact
     * @return JsonResponse
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $data = $request->only(['name', 'phone', 'favorited']);
        try {
            $this->contactService->update($contact, $data);
        } catch (Exception $e) {
            abort(500);
        }
        return response()->json(['contact' => $contact], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return JsonResponse|int
     */
    public function destroy(Contact $contact)
    {
        try {
            $this->contactService->destroy($contact);
        } catch (Exception $e) {
            abort(500);
        }
        return response()->json(['message' => 'deleted'], 200);
    }

    /**
     * Toggle favorited state
     *
     * @param Contact $contact
     * @return JsonResponse
     */
    public function toggleFavoritedState(Contact $contact)
    {
        try {
            $this->contactService->toggleFavoritedState($contact);
        } catch (Exception $e) {
            abort(500);
        }
        return response()->json(['contact' => $contact], 200);
    }
}
