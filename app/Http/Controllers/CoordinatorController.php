<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\ClassRearrange;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CoordinatorNotification;
use App\Models\CoordinatorToCr;
use App\Models\CrToCoordinator;
use Illuminate\Support\Facades\Redirect;

class CoordinatorController extends Controller
{

    public function AppointCr()
    {
        return view('coordinator.AppointCr');
    }

    public function getCrData(Request $req)
    {

        //dd($req->all());
        $department = $req->department;

        $semester = $req->semester;

        $section = $req->section;
        //dd($department,$semester,$section);
        //$student = User::where(['department'=>$department,'semester'=>$semester,'section'=>$section])->get();
        $student = DB::table('users')
                            ->where('department','=',$department)
                            ->where('section','=',$section)
                            ->where('semester','=',$semester)
                            ->get();

        return view('coordinator.AppointCr',compact('student'));
    }

    public function UpdateCr($id)
    {

        $data = User::find($id);
        $data->role_id = 1;
        $data->save();
        return Redirect::back()->with('message','Operation done successfully');


    }

    public function RemoveCr($id)
    {

        $data = User::find($id);
        $data->role_id = 3;
        $data->save();
        return Redirect::back()->with('message','Operation done successfully');


    }

    public function statistic()
    {
        $total_user = DB::table('users')
                                ->where('role_id','!=',2)

                                ->count();
        $EE = DB::table('users')
                        ->where('department','=','EE')
                        ->count();

        $CS = DB::table('users')
                        ->where('department','=','CS')
                        ->count();
        $CE = DB::table('users')
                        ->where('department','=','CE')
                        ->count();

        $BBA = DB::table('users')
                        ->where('department','=','BBA')
                        ->count();
        $BAF = DB::table('users')
                        ->where('department','=','BAF')
                        ->count();
        $ME = DB::table('users')
                        ->where('department','=','ME')
                        ->count();
        $SE = DB::table('users')
                        ->where('department','=','SE')
                        ->count();
        //dd($total_user,$CS,$CE);

        return view('coordinatorhome',compact('total_user','EE','CS','CE','BBA','BAF','ME','SE'));

    }

    public function editDetails($id)
    {
        $data = User::find($id);
       // dd($data);
        return view('coordinator.update',['data'=>$data]);

    }

    public function UpdateDetails(Request $req)
    {
        $RegNo=$req->batch.'-'.$req->program.'-'.$req->reg;

        $data = User::find($req->id);
        //dd($data);
        $data->regno = $RegNo;
        $data->name = $req->name;
        $data->section = $req->section;
        $data->email = $req->email;
        $data->semester = $req->semester;
        $data->department = $req->department;

        $data->save();
        $req->session()->flash('message','Student Record Updated Successfully');
        return  Redirect::route('getCrData');

    }

    public function PostNotificationView()
    {
        return view('coordinator.PostNotification');
    }

    public function PostNotification(Request $req)
    {
        //dd($req->all());
        $req->validate([
            'code'=>'required',
            'subject'=>'required',
            'description'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg'
        ]);
        $image=$req->file('image');
        if($image!=null)
        {
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('NotificationImages'),$imageName);
        }
        $data = new CoordinatorNotification;
        $data->code = $req->code;
        $data->subject = $req->subject;
        $data->description = $req->description;
        if($image==null){
            $data->image = null;
        }
        else{
            $data->image = $imageName;
        }

        $data->save();

        return redirect(route('post_notification_view'))->with(['message'=>'Notification Delivered']);
    }

    public function ViewClassReschedule()
    {
        return view('coordinator.ClassReschedule');
    }

    public function ClassReschedule(Request $req)
    {
        $req->validate([
            'slot'=>'required | integer',
            'room_no'=>'required | integer'
        ]);
        $data = new ClassRearrange();
        $date=Carbon::now()->toDateString();
        $data->time = $req->time;
        $data->room_no = $req->room_no;
        $data->slot = $req->slot;
        $data->date = $date;
        $data->save();
        return redirect(route('View_ClassReschedule'))->with(['message'=>'Rescheduling Data Added Successfully']);
        //dd($req->all(),$date);
    }

    public function ViewSechedule()
    {
        $data = DB::table('class_rearranges')
                        ->orderByDesc('date')
                        ->get();
       // dd($data);
        return view('coordinator.ViewClassReschedule',compact('data'));
    }

    public function DeleteSchedule($id)
    {

        $data = ClassRearrange::find($id)->delete();
        return redirect(route('View_schedule'))->with(['message'=>'Record Deleted Successfully']);
    }

    public function ViewCourse()
    {
        return view('coordinator.courses');
    }

    public function PostCourse(Request $req)
    {
        //dd($req->all());

        $req->validate([
            'course_code' => 'required ',
            'course_name' => 'required | string',

        ]);

        Course::create([
            'code' => $req->course_code,
            'name' => $req->course_name,
            'department' => $req->department
        ]);



        //dd($notification);

        return Redirect::back()->with('message','Course Added Successfully');


    }

    public function ShowCourse()
    {

        $data = DB::table('courses')->get();

       $item= $data->groupBy('department');

      $zero=$data->where('isActive','=',0);
      $one=$data->where('isActive','=',1);
       // dd($zero,$one);

       return view('coordinator.ShowCourse',compact('item','zero','one'));
    }


    public function CloseRegistration(Request $req)
    {
        $data = DB::table('courses')->update(['isActive'=>0]);

        return Redirect::back()->with('message','Course Registration Closed Successfully');
    }

    public function OpenRegistration(Request $req)
    {
        $data = DB::table('courses')->update(['isActive'=>1]);

        return Redirect::back()->with('message','Course Registration Opened Successfully');
    }

    public function DeleteCourse($id)
    {
       Course::find($id)->delete();
       return Redirect::back()->with('message','Course Deleted Successfully');
    }

    public function ViewMsgCr()
    {
        $data = CrToCoordinator::orderBy('created_at','DESC')->paginate(5);
        //dd($data);
        return view('coordinator.ViewMsgCr',compact('data'));
    }

    public function DeleteMsgCr($id)
    {
        $data = CrToCoordinator::find($id)->delete();
        return Redirect::back()->with('success','Message Deleted Successfully');
    }

    public function ViewReplyFromCoordinator($reg_no)
    {
       // dd($reg_no);
        return view('coordinator.ReplyToCr',compact('reg_no'));
    }

    public function ReplyToCr(Request $req)
    {
        //dd($req->all());
        $req->validate([
            'subject' => 'required|alpha',
            'description' => 'required|alpha'

        ]);

      $data = new CoordinatorToCr();
      $data->subject = $req->subject;
      $data->description = $req->description;
      $data->reg_no = $req->reg_no;
      $check = $data->save();
      if($check)
      {
          return Redirect::back()->with('success','Reply Sent to '.$data->reg_no);
      }
      else{
          return Redirect::back()->with('error','Something Went Wrong!');
      }

    }

}


