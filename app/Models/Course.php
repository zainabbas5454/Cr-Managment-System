<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'name',
        'department',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'course_registrations','course_id','user_id');
    }
}
