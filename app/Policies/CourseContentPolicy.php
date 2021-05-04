<?php

namespace App\Policies;

use App\Models\CourseContent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseContentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //return $user;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseContent  $courseContent
     * @return mixed
     */
    public function view( CourseContent $courseContent)
    {
        //dd($courseContent->course_id);
        return $courseContent->course_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseContent  $courseContent
     * @return mixed
     */
    public function update(User $user, CourseContent $courseContent)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseContent  $courseContent
     * @return mixed
     */
    public function delete(User $user, CourseContent $courseContent)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseContent  $courseContent
     * @return mixed
     */
    public function restore(User $user, CourseContent $courseContent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseContent  $courseContent
     * @return mixed
     */
    public function forceDelete(User $user, CourseContent $courseContent)
    {
        //
    }
}
