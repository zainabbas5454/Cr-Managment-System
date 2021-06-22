@extends('layouts.Cr-navbar')

@section('content')
    <h1 style="text-align: center">Dashboard</h1>
    @if(Auth::user()->email_verified_at == null)
    <div class="alert alert-danger">Your Email is not Verified yet! Kindly verify your Email  <a class="btn btn-danger btn-sm" style="float: right;" href="{{route('resendEmail') }}">Resend Email Verification Link</a></div>
    @endif
    @if(Session::has('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-error">{{session('error')}}</div>
    @endif
    <div class="card ml-5" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width:90%;">
        <div class="card-header" style="text-align:center;">
          Registered Courses List
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Course Code</th>
                        <th style="text-align: center;">Course Name</th>
                        <th style="">Actions</th>

                    </tr>
                </thead>
                @foreach ($result as $item )
                <tbody>
                    <tr>


                        <td style="text-align: center;">{{$item->code}}</td>

                        <td style="text-align: center;">{{$item->name}}</td>

                        @if($isActive->isNotEmpty())
                        <td colspan="2"><a class="btn btn-primary btn-sm mr-3" style=" background-color:#00203FFF;" href="{{route('RegisterDelete',$item->course_id)}}">Delete</a>

                        @endif

                        <td><a class="btn btn-primary btn-sm mr-2"   style="background-color:#00203FFF;"href="{{route('viewCourseContent',$item->course_id)}}">Add Content</a><a class="btn btn-primary btn-sm mr-2" style=" background-color:#00203FFF;" href="{{route('viewPostNotification',$item->course_id)}}">Post Notification</a><a  style=" background-color:#00203FFF;" class="btn btn-primary btn-sm" href="{{route('ViewMarksList',$item->course_id)}}">Upload Marks List</a></td>





                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
      </div>

@endsection


