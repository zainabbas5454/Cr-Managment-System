
@extends('layouts.navbar')
@section('title')
Post Notification
@endsection
@section('content')

    <h1 style="text-align: center;">Add Course</h1>
    <div class="container">
        @if($errors->any())
        @foreach ($errors->all() as $error )
        <div class="alert alert-danger">
            {{$error}}
        </div>
        @endforeach
        @endif
    <div class="card">
        <div class="card-header">
          Add Course
        </div>
        <div class="card-body">
          <form action="{{route('PostCourse')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for='code'>Course Code*</label>
                <input type="text" class="form-control" name="course_code" id="course_code" placeholder="Enter Course code"  >
              </div>

              <div class="form-group">
                <label for='name'>Course Name* </label>
                <input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter Course Name"  >
              </div>

              <div class=" form-group">
                <label for='department'>Department* </label>
                <select class=" form-control" name="department">
                    <option value="CS">CS</option>
                    <option value="ME">ME</option>
                    <option value="CE">CE</option>
                    <option value="BBA">BBA</option>
                    <option value="BAF">BAF</option>
                    <option value="SE">SE</option>
                    <option value="EE">EE</option>

                </select>
            </div>

              <div class=" text-center">
                <button type="submit" class=" btn btn-info">Submit</button>
              </div>

          </form>
        </div>
      </div>
</div>

@endsection
