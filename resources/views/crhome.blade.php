@extends('layouts.Cr-navbar')

@section('content')
    <h1 style="text-align: center">Dashboard</h1>
    @if(Session::has('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-error">{{session('error')}}</div>
    @endif
    <div class="card" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
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
                        <td colspan="2"><a class="btn btn-primary btn-sm mr-3" href="{{route('RegisterDelete',$item->course_id)}}">Delete</a>

                        @endif

                        <td><a class="btn btn-primary btn-sm mr-2" href="{{route('viewCourseContent',$item->course_id)}}">Add Content</a><a class="btn btn-primary btn-sm mr-2" href="{{route('viewPostNotification',$item->course_id)}}">Post Notification</a><a class="btn btn-primary btn-sm" href="{{route('ViewMarksList',$item->course_id)}}">Upload Marks List</a></td>





                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
      </div>

@endsection


