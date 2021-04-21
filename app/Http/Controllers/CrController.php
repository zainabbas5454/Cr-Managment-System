<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseContent;
use App\Models\CourseNotification;
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
        ->select('*')
        ->where('u.id','=',$user)
        ->get();
      //  dd($result);

       $isActive = DB::table('courses')
       ->where('isActive','=',1)->get();

        return view('crhome',compact('result','isActive'));
    }

    public function RegisterDelete($id)
    {
      //  dd($id);
       $data= DB::table('course_registrations')
                    ->where('course_id','=',$id)->delete();
        if($data)
        {
            return Redirect::back()->with('message','Course Registration Deleted Successfully');
        }

        else
        {
            return Redirect::back()->with('error','Something Went wrong');
        }

    }

    public function viewCourseContent($id)
    {
        //dd($id);
        return view('CR.CourseContent',compact('id'));
    }

    public function PostCourseContent(Request $req)
    {
        $req->validate([
            'slides' => 'mimes:pdf,ppt, pptx',
            'notes' => 'mimes:pdf,docx,doc',
            'book' => 'mimes:pdf,docx,doc',
            'image' => 'mimes:jpeg,png, jpg'
        ]);
        //dd($req->all());

        $semester = Auth::user()->semester;
        $section = Auth::user()->section;
        $department = Auth::user()->department;

        //dd($semester,$section,   $department);

        //Adding Data to Database

        $data = new CourseContent();

        $slides=$req->file('slides');
        if($slides!=null){
        $slideName = time().'.'.$slides->extension();
        $slides->move(public_path('Slides'),$slideName);
    }

        $notes=$req->file('notes');
        if($notes!=null){
            $notesName = time().'.'.$notes->extension();
        $notes->move(public_path('Notes'),$notesName);

        }

        $books=$req->file('book');
        if($books!=null)
        {
            $booksName = time().'.'.$books->extension();
            $books->move(public_path('Books'),$booksName);
        }


        $image=$req->file('image');
        if($image!=null)
        {
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('CourseImages'),$imageName);

        }



        //dd($slides,$notes,$books,$image);
        $data->slides = $slides;
        $data->notes = $notes;
        $data->books = $books;
        $data->image = $image;
        $data->semester = $semester;
        $data->section = $section;
        $data->department = $department;
        $data->course_id = $req->course_id;

        $data->save();
        return Redirect::back()->with('success',"Course Contents Has been Uploaded");
    }

    public function viewPostNotification($id)
    {
       //dd($id);
        return view('CR.PostNotification',compact('id'));
    }

    public function PostNotification(Request $req)
    {
        $req->validate([
            'code' => 'required',
            'subject' => 'required|string',
            'description' => 'required|string',
            'file' => 'mimes:pdf,jpg,jpeg,png'
        ]);
            $file = $req->file('file');
            if($file!=null)
            {
                $fileName = time().'.'.$file->extension();
                $file->move(public_path('CourseNotificationFiles'),$fileName);
            }
           // dd($file);
        $data = new CourseNotification();
        $data->code = $req->code;
        $data->subject = $req->subject;
        $data->description = $req->description;
        $data->file = $file;
        $data->course_id = $req->course_id;

        $check = $data->save();

        if($check)
        {
            return Redirect::back()->with('success','Notification has been delivered to class');
        }

        else
        {
            return Redirect::back()->with('error','Something went wrong! Please try again');
        }
    }





}
