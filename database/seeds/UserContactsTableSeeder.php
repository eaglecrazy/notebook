<?php

use App\Contact;
use App\User;
use App\UserContact;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $contacts = Contact::all();
        $user_contacts = [];
        foreach ($users as $user) {
            $user_id = $user->id;
            foreach ($contacts as $contact)
                if (!rand(0, 7)) {
                    $user_contacts[] = [
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'user_id' => $user_id,
                        'contact_id' => $contact->id,
                        'favorite_contact' => !rand(0, 3) ?? true,
                    ];
                }
        }
        UserContact::insert($user_contacts);
    }
}
