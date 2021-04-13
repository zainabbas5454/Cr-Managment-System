

@extends('layouts.Cr-navbar')

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
                <td colspan="2"><a class="btn btn-primary btn-sm mr-3" href="{{route('ViewRegistration',$item->id)}}">Register</a>
            </tr>
        </tbody>
        @endforeach

    </table>
    @else
<div class="alert alert-danger">Registration Closed! You are too late. Kindly contact coordinator for reopen registration</div>
@endif




@endsection
