@extends('layouts.Cr-navbar')
@section('content')
<h2>Are you sure you want to Register the course "{{$name}}"</h2>
<form action="{{route('PostRegistration')}}" method="POST">
    @csrf
    <input type="hidden" name="course_id" value="{{$cid}}">
    <button type="submit" class="btn btn-primary">OK</button>
    <a class="btn btn-danger" href="{{route('Course_Registration')}}">Cancel</a>
</form>



@endsection
