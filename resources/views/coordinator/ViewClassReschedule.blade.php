@extends('layouts.navbar')

@section('title')
Class Reschedule
@endsection

@section('content')
<div class="container-fluid">
    <h1 style="text-align: center">Class Reschedule</h1>
    @if(Session::has('success'))
    <div class="alert alert-success">  {{session('success')}}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Time</th>
                <th>Room Number</th>
                <th>Slot</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
         @foreach ($data as $item )
        <tbody>
            <tr>
                <td>{{$item->time}}</td>
                <td>{{$item->room_no}}</td>
                <td>{{$item->slot}}</td>
                <td>{{$item->date}}</td>
                <td colspan="2"><a class="btn btn-success btn-sm mr-3" href="{{route('Delete_Schedule',$item->id)}}">Delete</a>


            </tr>
        </tbody>
        @endforeach

    </table>
</div>
@endsection
