<?php


namespace App\Services;


use App\Contact;
use Auth;
use Exception;

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

    /**
     * Insert new contact to storage.
     *
     * @param array $data
     * @return Contact
     */
    public function store(array $data)
    {
        $data['user_id'] = Auth::id();
        if (isset($data['favorited']) && $data['favorited'] === 'on') {
            $data['favorited'] = true;
        } else {
            $data['favorited'] = false;
        }
        return Contact::create($data);
    }

    /**
     * Update the contact.
     *
     * @param Contact $contact
     * @param array $data
     * @return void
     */
    public function update(Contact $contact, array $data)
    {
        $data['user_id'] = Auth::id();
        if (isset($data['favorited']) && $data['favorited'] === 'on') {
            $data['favorited'] = true;
        } else {
            $data['favorited'] = false;
        }
        $contact->update($data);
    }
}
