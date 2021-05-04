@extends('layouts.student')
@section('content')
<h2>Are you sure you want to Register the course "{{$name}}"</h2>
<form action="{{route('Student_Post_Registration')}}" method="POST">
    @csrf
    <input type="hidden" name="course_id" value="{{$cid}}">
    <div class="d-flex justify-content-center">
    <button type="submit" style="margin:10px;" class="btn btn-primary">OK</button>
    <a class="btn btn-danger" style="margin:10px;"  href="{{route('Student_Course_Registration')}}">Cancel</a>
</div>
</form>



@endsection
