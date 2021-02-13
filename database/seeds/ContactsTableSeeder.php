<?php

use App\Contact;
use App\User;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::where('name', '!=', '')->delete();
        $users = User::all();
        foreach ($users as $user) {
            factory(Contact::class, 10)->create(['user_id' => $user->id]);
        }
    }
}
