<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
//query for retrieving data
//SELECT users.name, courses.name from users JOIN course_registrations JOIN courses WHERE users.id=course_registrations.user_id AND courses.id=course_registrations.course_id

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
        $isActive = DB::table('courses')
                            ->where('isActive','=',1)->get();


        //dd($course_id);

      return view('CR.CourseRegistration',compact('data','isActive'));
    }

    public function ViewRegistration($id)
    {
        $cid = $id;
        $name = $name = Course::find($id)->name;

        return view('CR.viewRegistration',compact('cid','name'));

    }

    public function PostRegistration(Request $req)
    {
        $data = new CourseRegistration();
        $data->user_id = Auth::user()->id;
        $data->course_id = $req->course_id;
        $data->status = 1;
        $response = $data->save();
        //dd($response);
        return Redirect::route('Course_Registration')->with('message','Course Registered Successfully');



    }


    public function RegisteredCourses()
    {
        $user = Auth::user()->id;
        //$query = "SELECT  courses.name from users JOIN course_registrations JOIN courses WHERE '$user'=course_registrations.user_id AND courses.id=course_registrations.course_id";
       // $results = DB::select( DB::raw($query) );
        $result=DB::table('course_registrations AS cr')
        ->join('users AS u', 'u.id' , '=', 'cr.user_id')
        ->join('courses AS c', 'c.id', '=', 'cr.course_id')
        ->select('c.name','u.id','c.code')
        ->where('u.id','=',$user)
        ->get();
       // dd($result);

       $isActive = DB::table('courses')
       ->where('isActive','=',1)->get();

        return view('crhome',compact('result','isActive'));
    }






}
