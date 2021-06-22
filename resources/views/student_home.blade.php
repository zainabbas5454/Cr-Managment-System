@extends('layouts.student')



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
    <div class="container-fluid">
    <div class="card" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

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
                        <td colspan="2"><a class="btn btn-primary btn-sm mr-3" href="{{route('Student_Delete_Registration',$item->course_id)}}">Delete</a>
                            @else
                            <td><a class="btn btn-primary btn-sm mr-2 mb-2" href="{{route('View_Content',$item->course_id)}}">View Content</a><a class="btn btn-primary btn-sm mr-2 mb-2" href="{{route('View_Notification',$item->course_id)}}">View Notification</a><a class="btn btn-primary btn-sm mb-2" href="{{route('ViewMarks',$item->course_id)}}">View Marks List</a></td>

                        @endif






                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
      </div>
    </div>
@endsection




