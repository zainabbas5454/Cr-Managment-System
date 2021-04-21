@extends('layouts.navbar')

@section('title')
Class Resechedule
@endsection

@section('content')
<div class="container">



    <h1 style="text-align: center;">Class Reschedule</h1>
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
    <div class="card"  style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="card-header">
          Class Reschedule
        </div>
        <div class="card-body">
          <form action="{{route('ClassReschedule')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for='time'>Time*</label>
                <select name="time" id="time" class="form-control">
                    <option value="8:30-10:00">8:30-10:00</option>
                    <option value="10:05-11:35">10:05-11:35</option>
                    <option value="11:40-1:10">11:40-1:10</option>
                    <option value="1:25-2:55">1:25-2:55</option>
                    <option value="3:00-4:30">3:00-4:30</option>
                </select>
              </div>

              <div class="form-group">
                <label for='room_no'>Room Number* </label>
                <input type="text" class="form-control" name="room_no" id="room_no" placeholder="Enter Room Number"  >
              </div>

              <div class="form-group">
                <label for='slot'>Slot*</label>
                <input type="text" class="form-control" name="slot" id="slot" placeholder="Enter Slot Number"  >

              </div>



              <div class=" text-center">
                <button type="submit" class=" btn btn-info">Submit</button>
              </div>

          </form>
        </div>
      </div>
</div>


@endsection
