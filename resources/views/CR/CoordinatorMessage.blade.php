@extends('layouts.Cr-navbar')

@section('content')
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success"> {{ session('success') }}</div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger"> {{ session('error') }}</div>
    @endif
    @if($errors->any())
    @foreach ($errors->all() as $error )
    <div class="alert alert-danger">
        {{$error}}
    </div>
    @endforeach
    @endif
    <h1 style="text-align: center;">Send Message TO Coordinator
    </h1>
    <div class="card mb-5" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="card-header">
          Send Message TO Coordinator
        </div>
        <div class="card-body">
          <form action="{{route('PostToCoordinator')}}" method="POST" enctype="multipart/form-data">
            @csrf



              <div class="form-group">
                <label for='subject'>Subject* </label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject of notification"  >
              </div>

              <div class="form-group">
                <label for='description'>Description*</label>
                <textarea class="form-control" id="description" name="description" rows="15" placeholder="Enter Description" ></textarea>
              </div>




              <div class=" text-center mb-5">
                <button type="submit" class=" btn btn-info">Submit</button>
              </div>


          </form>
        </div>
      </div>
</div>

@endsection
