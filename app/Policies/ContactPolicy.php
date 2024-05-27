<?php

namespace App\Policies;

use App\Models\User;

class ContactPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Contact $contact)
{
    return $user->id === $contact->user_id;
}

}
