@extends('layouts.navbar')
@section('title')
Post Notification
@endsection
@section('content')
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success"> {{ session('success') }}</div>
    @endif
    @if($errors->any())
    @foreach ($errors->all() as $error )
    <div class="alert alert-danger">
        {{$error}}
    </div>
    @endforeach
    @endif
    <h1 style="text-align: center;">Post Notification</h1>
    <div class="card">
        <div class="card-header">
          Post Notification
        </div>
        <div class="card-body">
          <form action="{{route('post_notification')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for='code'>Notification Code*</label>
                <input type="text" class="form-control" name="code" id="code" placeholder="Enter notification's code"  >
              </div>

              <div class="form-group">
                <label for='subject'>Subject* </label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject of notification"  >
              </div>

              <div class="form-group">
                <label for='description'>Description*</label>
                <textarea class="form-control" id="description" name="description" rows="15" placeholder="Enter Description" ></textarea>
              </div>

              <div class="form-group">
                <label for='image'>Image </label>
                <input type="file" class="form-control" name="image" id="image">
              </div>

              <div class=" text-center">
                <button type="submit" class=" btn btn-info">Submit</button>
              </div>

          </form>
        </div>
      </div>
</div>

@endsection
