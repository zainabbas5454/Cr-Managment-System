<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CrToClass;
use App\Models\CourseMarks;
use Illuminate\Http\Request;
use App\Models\CourseContent;
use App\Models\CourseNotification;
use App\Models\CourseRegistration;
use App\Models\CrToStudent;
use App\Models\StudentToCr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function Student_Course_Registration()
    {
        $dep = Auth::user()->department;

        $data = DB::table('courses')
                        ->where('department','=',$dep)->get();
        $isActive = DB::table('courses')
                            ->where('isActive','=',1)->get();


        //dd($course_id);

      return view('Student.CourseRegistration',compact('data','isActive'));
    }

    public function Confim_Registration($id)
    {
        //dd($id);

       // dd($data->status);

        $cid = $id;
        $name = $name = Course::find($id)->name;

        return view('Student.Confirm_Registration',compact('cid','name'));

    }

    public function Student_Post_Registration(Request $req)
    {  // dd($req->all());
        $data = new CourseRegistration();


        $data->user_id = Auth::user()->id;
        $data->course_id = $req->course_id;
        $data->status = 1;

        $response = $data->save();
       // dd($response);
        //dd($data->course_id);
        //dd($response);
        return Redirect::route('Student_Course_Registration')->with('message','Course Registered Successfully');



    }

    public function Student_Registered_Courses()
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

        return view('student_home',compact('result','isActive'));
    }

    public function Student_Delete_Registration($id)
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

    public function View_Content($id)
    {
        //dd($id);
        $data = CourseContent::where('course_id','=',$id)
                            ->where('department','=',Auth::user()->department)
                            ->where('section','=',Auth::user()->section)
                            ->orderBy('created_at','DESC')
                            ->get();
        //dd($data);
        return view('Student.ViewContent',compact('data'));
    }

    public function Download_Slides($slides)
    {
       // dd($slides);

       $slide = CourseContent::where('slides', $slides)->firstOrFail();
       //dd($image->mime);
       //dd($slide);
        $path = public_path('Slides/'.$slide->slides);
       // dd($path);
        $headers = ['Content-Type:mime'];
        $filename = $slide->slides;
        return response()->download($path,$filename, $headers);

    }

    public function Download_Notes($notes)
    {
       // dd($notes);

       $note = CourseContent::where('notes', $notes)->firstOrFail();
       //dd($image->mime);
       //dd($slide);
        $path = public_path('Notes/'.$note->slides);
       // dd($path);
        $headers = ['Content-Type:mime'];
        $filename = $note->notes;
        return response()->download($path,$filename, $headers);


    }

    public function Download_Books($books)
    {
        $book = CourseContent::where('books', $books)->firstOrFail();
        //dd($image->mime);
        //dd($slide);
         $path = public_path('Notes/'.$book->books);
        // dd($path);
         $headers = ['Content-Type:mime'];
         $filename = $book->books;
         return response()->download($path,$filename, $headers);
    }

    public function Download_Images($images)
    {
        $image = CourseContent::where('images',$images)->firstOrFail();

        $path = public_path('CourseImages/'.$image->images);

        $headers = ['Content-Type:mime'];
        $filename = $image->images;
        return response()->download($path,$filename, $headers);
    }

    public function View_Notification($id)
    {
       // dd($id);
        $data = CourseNotification::where('course_id',$id)
                                ->where('section',Auth::user()->section)
                                ->where('department',Auth::user()->department)
                                ->orderBy('created_at','DESC')
                                ->paginate(1);
        //dd($data);

        return view('Student.View_Course_Notification',compact('data'));
    }

    public function Download_File($file)
    {
        //dd($file);

        $data = CourseNotification::where('file',$file)->firstOrFail();

        $path = public_path('CourseNotificationFiles/'.$data->file);

        $headers = ['Content-Type:mime'];
        $filename = $data->file;
        return response()->download($path,$filename, $headers);
    }

    public function Mark_As_Read($id)
    {
        $data = CourseNotification::find($id);
        $data->isread = 0;
        $data->save();
        return Redirect::back()->with('success','Notification Mark As Read');
    }

    public function ViewMarks($id)
    {
        //dd($id);

        $data = CourseMarks::where('course_id',$id)
                            ->where('section',Auth::user()->section)
                            ->where('department',Auth::user()->department)
                            ->orderBy('created_at','DESC')
                            ->get();
        //dd($data);

        return view('Student.View_Marks_List',compact('data'));
    }

    public function Download_List($list)
    {
        //dd($list);

        $data = CourseMarks::where('marks_list',$list)->firstOrFail();

        $path = public_path('MarksLists/'.$data->marks_list);

        $headers = ['Content-Type:mime'];
        $filename = $data->file;
        return response()->download($path,$filename, $headers);
    }

    public function View_Cr_Notification()
    {
        $data = CrToClass::where('department',Auth::user()->department)
                        ->where('section',Auth::user()->section)
                        ->where('semester',Auth::user()->semester)
                        ->orderBy('created_at','DESC')
                        ->paginate(1);

        //dd($data);

        return view('Student.View_Cr_Notification',compact('data'));
    }

    public function Send_Message_to_Cr()
    {
        return view('Student.SendMessage');
    }

    public function PostMessage(Request $req)
    {
        //dd($req->all());
        $data = new StudentToCr();
        $data->subject = $req->subject;
        $data->description = $req->description;
        $data->semester = Auth::user()->semester;
        $data->section = Auth::user()->section;
        $data->department = Auth::user()->department;
        $data->reg_no = Auth::user()->regno;

        $check = $data->save();

        if($check)
        {
            return Redirect::back()->with('success','Message Has Been Sent');

        }
        else
        {
            return Redirect::back()->with('error','Something Went Wrong');
        }

    }

    public function getReplyFromCr()
    {
        $data = CrToStudent::where('section',Auth::user()->section)
                            ->where('department',Auth::user()->department)
                            ->where('semester',Auth::user()->semester)
                            ->where('reg_no',Auth::user()->regno)
                            ->paginate(1);
        //dd($data);

        return view('Student.ReplyFromCr',compact('data'));
    }

    public function DeleteMsgFromCR($id)
    {
        $data = CrToStudent::find($id)->delete();

        if($data)
        {
            return Redirect::back()->with('success','Message Has Been Deleted');
        }

        else
        {
            return Redirect::back()->with('error','Something Went Wrong! Try Again Later');
        }
    }
}
