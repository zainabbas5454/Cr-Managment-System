<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class CrPolicy
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

    public function Marks(User $user,Course $course)
    {
       return $user->id == $course->id;
    }

}
