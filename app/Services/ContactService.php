<?php


namespace App\Services;


use App\Contact;

class ContactService
{
    /**
     * Toggle favorited state
     *
     * @param Contact $contact
     * @return void
     */
    public function toggleFavoritedState(Contact $contact)
    {
        $contact->update(['favorited' => $contact->favorited ? false : true]);
    }
}
