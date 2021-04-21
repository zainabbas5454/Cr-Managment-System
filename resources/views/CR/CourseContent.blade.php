@extends('layouts.Cr-navbar')

@section('content')
<h1 style="text-align: center;">Post Course Content</h1>
<div class="container-fluid">
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
<div class="card">
    <div class="card-header">
      Post Contents
    </div>
    <div class="card-body">
      <form action="{{route('PostCourseContent')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="course_id" value="{{$id}}">
          <div class="form-group">
            <label for='slides'>Upload Slides</label>
            <input type="file" class="form-control" name="slides" id="slides">
          </div>

          <div class="form-group">
            <label for='notes'>Upload Notes Here </label>
            <input type="file" class="form-control" name="notes" id="notes">
        </div>

        <div class="form-group">
            <label for='book'>Upload Book Here </label>
            <input type="file" class="form-control" name="book" id="book">
        </div>

          <div class="form-group">
            <label for='image'>Upload Image Here </label>
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
