<?php

namespace App\Policies\Api;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodolistPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
