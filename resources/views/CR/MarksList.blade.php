@extends('layouts.Cr-navbar')

@section('content')
<h1 style="text-align: center;">Upload Marks List</h1>
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
      Upload Marks List
    </div>
    <div class="card-body">
      <form action="{{route('PostList')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="course_id" value="{{$id}}">
          <div class="form-group">
            <label for='list'>Upload List</label>
            <input type="file" class="form-control" name="list" id="list">
          </div>


          <div class=" text-center">
            <button type="submit" class=" btn btn-info">Submit</button>
          </div>

      </form>
    </div>
  </div>
</div>
@endsection
