<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('name', '!=', '')->delete();
        User::create([
            'name' => 'eagle',
            'email' => 'eaglezzzzz@rambler.ru',
            'email_verified_at' => now(),
            'password' => '$2y$10$Vs9b..LgH9ORhVHmeE.Ji.VQFrc1yP9qRnHkTzrrEL1e9JeUROy1W', // 1
            'remember_token' => Str::random(10),
        ]);
        factory(User::class, 10)->create();
    }
}
