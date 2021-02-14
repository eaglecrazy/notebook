<?php


namespace App\Services;


use App\Contact;
use Exception;
use Illuminate\Http\Response;

class ContactService
{
    /**
     * Toggle contact favorited state
     *
     * @param Contact $contact
     * @return void
     * @throws Exception
     */
    public function toggleFavoritedState(Contact $contact)
    {
        $contact->update(['favorited' => $contact->favorited ? false : true]);
    }

    /**
     * Remove the contact from storage.
     *
     * @param Contact $contact
     * @return void
     * @throws Exception
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
    }
}
