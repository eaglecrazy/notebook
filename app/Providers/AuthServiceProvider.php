<?php

namespace App\Providers;

use App\Contact;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPermissions();
        //
    }

    /**
     * Gate to manage contacts
     */
    private function registerPermissions(): void
    {
        Gate::define('manage-own-contacts', function (User $user, Contact $contact) {
            return $contact->user_id === $user->id;
        });
    }
}
