
@extends('layouts.navbar')

@section('title')
Courses Offered
@endsection

@section('content')
<div class="container-fluid">
    <h1 style="text-align: center">Courses Offered</h1>
    @if(Session::has('success'))
    <div class="alert alert-success">  {{session('success')}}</div>
    @endif
    @if($one->isEmpty())
    <div class="container d-flex justify-content-end">
        <a class="btn btn-success" href="{{route('Open_Registration')}}">Open Registration</a>
        </div>
    @endif
    @if($zero->isEmpty())
    <div class="container d-flex justify-content-end">
    <a class="btn btn-primary" href="{{route('Close_Registration')}}">Close Registration</a>
    </div>
    @endif
    @foreach ($item as $department => $item)
    <h2 style="text-align: center;">{{$department}}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th style="float: right;">Action</th>
            </tr>
        </thead>
        @foreach ($item as $j )
        <tbody>
            <tr>
                <td>{{$j->code}}</td>
                <td>{{$j->name}}</td>
                <td colspan="2"><a class="btn btn-danger btn-sm" style="float: right;" href="{{route('Delete_Course',$j->id)}}">Delete</a></td>


            </tr>
        </tbody>
        @endforeach
    </table>




@endforeach



</div>
@endsection
