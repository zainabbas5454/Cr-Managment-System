<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;

    public function course()
    {
        $this->belongsTo(Course::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
