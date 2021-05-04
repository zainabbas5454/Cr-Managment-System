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
          <h5 class="card-title">Notification Code</h5>
          <p class="card-text">{{$item->code}}</p>
          <h5 class="card-title">Notification Subject</h5>
          <p class="card-text">{{$item->subject}}</p>
          <h5 class="card-title">Notification Description</h5>
          <p class="card-text">{{$item->description}}</p>
          @if($item->file!=null)
          <h5 class="card-title">Notification File</h5>

          <p class="card-text">{{$item->file}}</p><a class="btn btn-success" href="{{route('Download_file',$item->file)}}">Download file</a>
            @endif
            @if($item->isread == 1)
            <a class="btn btn-danger" style="float:right;"href="{{route('Mark_As_Read',$item->id)}}"> Mark As Read</a>
            @endif

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
