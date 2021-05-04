@extends('layouts.student')


@section('content')
<h1 style="text-align: center;">Notification Pannel</h1>
@if(session()->has('success'))
<div class="alert alert-success"> {{ session('success') }}</div>
@endif
    @foreach ($data as $item )
    <div class="card">
        <div class="card-header">
         Notifications
        </div>
        <div class="card-body">


          <h5 class="card-title">Notification Subject</h5>
          <p class="card-text">{{$item->subject}}</p>
          <h5 class="card-title">Notification Description</h5>
          <p class="card-text">{{$item->description}}</p>


            

        </div>
      </div>

    @endforeach
    <span>
        {{$data->links()}}
    </span>
    <style>
        .w-5{
            display: none;
        }
    </style>

@endsection

