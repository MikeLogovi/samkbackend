<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
class CommentPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any comments.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function view(User $user, Comment $comment)
    {    
    }

    /**
     * Determine whether the user can create comments.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->role==config('samk.roles')[1]&& Auth()->is_now_commentator==true)|| $user->role=='admin';
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        return (($user->role==config('samk.roles')[1]&& Auth()->is_now_commentator==true) && Auth::id == $comment->user->id ) || $user->role=='admin';

    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return (($user->role==config('samk.roles')[1]&& Auth()->is_now_commentator==true) && Auth::id == $comment->user->id) || $user->role=='admin';
    }

    /**
     * Determine whether the user can restore the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function restore(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function forceDelete(User $user, Comment $comment)
    {
        //
    }
}
