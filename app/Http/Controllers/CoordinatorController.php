<?php

namespace App\Http\Controllers;

use App\Models\ClassRearrange;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CoordinatorNotification;
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
        return Redirect::back()->with('success','Operation done successfully');


    }

    public function RemoveCr($id)
    {

        $data = User::find($id);
        $data->role_id = 3;
        $data->save();
        return Redirect::back()->with('success','Operation done successfully');


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
        $req->session()->flash('success','Student Record Updated Successfully');
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

        return redirect(route('post_notification_view'))->with(['success'=>'Notification Delivered']);
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
        return redirect(route('View_ClassReschedule'))->with(['success'=>'Rescheduling Data Added Successfully']);
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
        return redirect(route('View_schedule'))->with(['success'=>'Record Deleted Successfully']);
    }







}


