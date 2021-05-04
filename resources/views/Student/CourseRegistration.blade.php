@extends('layouts.student')

@section('content')
<h1 style="text-align:center;">Course Registration</h1>
<div class="container-fluid">
    @if(Session::has('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-error">{{session('error')}}</div>
    @endif
@if($isActive->isNotEmpty())
<div class="card"  style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="card-header">
    Course Registration
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($data as $item )
            <tbody>
                <tr>
                    <td>{{$item->code}}</td>

                    <td>{{$item->name}}</td>

                    <td>{{$item->department}}</td>
                    <td colspan="2"><a class="btn btn-primary btn-sm mr-3" href="{{route('Confirm_Registration',$item->id)}}">Register</a></td>
                </tr>
            </tbody>
            @endforeach

        </table>
    </div>
  </div>

    @else
<div class="alert alert-danger">Registration Closed! You are too late. Kindly contact coordinator for reopen registration</div>
@endif




@endsection
