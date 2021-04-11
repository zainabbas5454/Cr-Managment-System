<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CrController extends Controller
{
    public function ViewCourseRegistration()
    {
        return view('CR.CourseRegistration');
    }

    public function CourseRegistration()
    {
        $dep = Auth::user()->department;

        $data = DB::table('courses')
                        ->where('department','=',$dep)->get();
        //dd($data);
      return view('CR.CourseRegistration',compact('data'));
    }
}
