<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CrToClass;
use App\Models\CourseMarks;
use Illuminate\Http\Request;
use App\Models\CourseContent;
use App\Models\CoordinatorToCr;
use App\Models\CrToCoordinator;
use App\Models\CourseNotification;
use App\Models\CourseRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Crypt;
use App\Models\CoordinatorNotification;
use App\Models\CrToStudent;
use App\Models\StudentToCr;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\File\File;
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

        $status=0;
        //dd($course_id);
        // $status=DB::table('course_registrations')->where('user_id','=',Auth::user()->id)
        //                                          ->where('user_id','=',Auth::user()->id);
      return view('CR.CourseRegistration',compact('data','isActive','status'));
    }

    public function ViewRegistration($id)
    {
        //dd($id);

       // dd($data->status);

        $cid = $id;
        $name = $name = Course::find($id)->name;

        return view('CR.viewRegistration',compact('cid','name'));

    }

    public function PostRegistration(Request $req)
    {  // dd($req->all());
        $data = new CourseRegistration();


        $data->user_id = Auth::user()->id;
        $data->course_id = $req->course_id;
        $data->status = 1;

        $response = $data->save();

        //dd($data->course_id);
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
       // dd($response);
    //    $response=Gate::authorize('view', $id);
    //    dd($response);
        //  $id = Crypt::decrypt($id);
        //  dd($id);
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
        if($slides == null)
        {
            $data->slides = null;
        }
        else
        {
            $data->slides = $slideName;
        }

        if($notes == null)
        {
            $data->notes = null;
        }
        else{
            $data->notes = $notesName;
        }

        if($books == null)
        {
            $data->books = null;
        }
        else
        {
            $data->books = $booksName;
        }

        if($image == null)
        {
            $data->image = null;
        }
        else
        {
            $data->image = $imageName;
        }


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
        $data->file = $fileName;
        $data->course_id = $req->course_id;
        $data->semester = Auth::user()->semester;
        $data->section = Auth::user()->section;
        $data->department = Auth::user()->department;

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

    // public function test()
    // {
    //     $data = DB::table('course_contents')->get();
    //     return view('CR.test',compact('data'));
    // }

    public function ViewMarksList($id)
    {
        //dd($id);
       //$res =  Gate::authorize('Marks',[$id]);
     // dd($res);
        return view('CR.MarksList',compact('id'));
    }

    public function PostList(Request $req)
    {
        $req->validate([
            'list' => 'required|mimes:xlsx'
        ]);
        $semester = Auth::user()->semester;
        $section = Auth::user()->section;
        $department = Auth::user()->department;



        $data = new CourseMarks();

        $file=$req->file('list');
       // dd($file);

        $fileName = time().'.'.$file->extension();

        $file->move(public_path('MarksLists'),$fileName);
        $data->marks_list = $fileName;
        $data->semester = $semester;
        $data->section = $section;
        $data->department = $department;
        $data->course_id = $req->course_id;
        $data->save();
        return Redirect::back()->with('success','Sheets has successfully been uploaded');


    }

    public function ViewNotificationFromCoordinator()
    {
       $data = CoordinatorNotification::orderBy('created_at','DESC')->paginate(1);
       //dd($data);
        $unread = DB::table('coordinator_notifications')
                        ->where('isRead','=',1)
                        ->get();
        //dd($read);
        $read = DB::table('coordinator_notifications')
        ->where('isRead','=',0)
        ->get();
        return view('CR.NotificationFromCoordinator',compact('data','read','unread'));
    }

    public function DownloadImage($image)
    {
       // dd($image);
        $image = CoordinatorNotification::where('image', $image)->firstOrFail();
       //dd($image->mime);
        $path = public_path('NotificationImages/'.$image->image);
        $headers = ['Content-Type:mime'];
        $filename = $image->image;
       // dd($path);
        // if (file_exists(public_path('NotificationImages/1619192509.png'))) {
        //     dd('File is Exists ');
        //   }else{
        //      dd('File is Not Exists');
        //   }
        return response()->download($path,$filename, $headers);
//    $path = public_path(). '/NotificationImages/'. $image->$image;
//    dd($path);
//   return response()->download($path, $image
//              ->original_filename, ['Content-Type' => $image->mime]);
     }

     public function ViewClassNotification()
     {
         return view('CR.ClassNotification');
     }

     public function PostClassNotification(Request $req)
     {
        //dd($req->all());
        $req->validate([
            'subject' => 'required|alpha',
            'description' => 'required|alpha',

        ]);
        $data = new CrToClass();
        $data->subject = $req->subject;
        $data->description = $req->description;
        $data->department = Auth::user()->department;
        $data->section = Auth::user()->section;
        $data->semester = Auth::user()->semester;
            $check = $data->save();
            if($check)
            {
                return Redirect::back()->with('success','Notification has been delivered');
            }
            else
            {
                return Redirect::back()->with('error','Something Went Wrong');
            }

     }

     public function MarkAsRead($id)
     {
         //dd($id);
         $data = CoordinatorNotification::find($id);
         $data->isRead = 0;
         $data->save();
         return Redirect::back()->with('success','Notification Mark As Read');
     }

     public function ViewCrToCoordinator()
     {
         return view('CR.CoordinatorMessage');
     }

     public function PostToCoordinator(Request $req)
     {
       // dd($req->all());

       $req->validate([
        'subject' => 'required|alpha',
        'description' => 'required|alpha'
       ]);

       $data = new CrToCoordinator();
       $data->subject = $req->subject;
       $data->description = $req->description;
       $data->department = Auth::user()->department;
       $data->semester = Auth::user()->semester;
       $data->section = Auth::user()->section;
       $data->reg_no = Auth::user()->regno;

       $check = $data->save();

       if($check)
       {
           return Redirect::back()->with('success','Message successfully sent to Coordinator');
       }
       else
       {
        return Redirect::back()->with('error','Something Went Wrong');
       }
     }

     public function ViewCoordinatorToCr()
     {
         $data = CoordinatorToCr::where('reg_no',Auth::user()->regno)->paginate(5);
         //dd($data);
         return view('CR.ViewMessageFromCoordinator',compact('data'));
     }

     public function DeleteMsgFromCoordinator($id)
     {
         $data = CoordinatorToCr::find($id)->delete();
         if($data)
         {
             return Redirect::back()->with('success','Message Deleted Successfully');

         }
         else
         {
             return Redirect::back()->with('error','Something Went Wrong!');
         }
     }

     public function getStudentMessage()
     {
         $data = StudentToCr::where('section',Auth::user()->section)
                            ->where('department',Auth::user()->department)
                            ->where('semester',Auth::user()->semester)
                            ->paginate(5);
        //dd($data);

        return view('CR.GetMessage',compact('data'));
     }

     public function ReplyToStudent($reg_no)
     {
         //dd($reg_no);
         return view('CR.ReplyToStudent',compact('reg_no'));
     }

     public function PostReplyToStudent(Request $req)
     {
       // dd($req->all());
       $req->validate([
           'subject' => 'required',
           'description' => 'required'
       ]);
       $data = new CrToStudent();
       $data->subject = $req->subject;
       $data->description = $req->description;
       $data->semester = Auth::user()->semester;
       $data->department = Auth::user()->department;
       $data->reg_no = $req->reg_no;
       $data->section = Auth::user()->section;
       $check = $data->save();
       if($check)
       {
           return Redirect::back()->with('success','Reply Successfully sent to '.$req->reg_no);
       }
       else
       {
           return Redirect::back()->with('error','Something Went Wrong! Try Again Later');
       }
     }

     public function deleteStudentMessage($id)
     {

        // dd($id);
        $data = StudentToCr::find($id)->delete();
        if($data)
        {
            return Redirect::back()->with('success',"Message Deleted Successfully");
        }
        else
        {
            return Redirect::back()->with('error','Something Went Wrong');
        }
     }











}
