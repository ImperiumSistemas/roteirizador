<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        Gate::define('update-post', function ($user, $post) {
        return $user->id == $post->user_id;
    }

    public function updatePost(User $user, Post $post){

        return $user->id === $post->user_id;

    }
}
