@extends('layouts.Cr-navbar')

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
          @if($item->image!=null)
          <h5 class="card-title">Notification File</h5>

          <p class="card-text">{{$item->image}}</p><a href="{{route('DownloadImage',$item->image)}}">Download</a>
            @endif
            @if($item->isRead == 1)
            <a class="btn btn-danger" style="float:right;"href="{{route('MarkAsRead',$item->id)}}"> Mark As Read</a>
            @endif

        </div>
      </div>
<span>
    {{$data->links()}}
</span>
    @endforeach


@endsection
