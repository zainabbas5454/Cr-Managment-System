@extends('layouts.Cr-navbar')
@section('content')
<h1 style="text-align: center;">Available Class Rooms</h1>
@if(Session::has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-error">{{session('error')}}</div>
    @endif
<div class="container-fluid">
    <div class="card" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Time</th>
                        <th style="text-align: center;">Room Number</th>
                        <th style="text-align: center;">Slot</th>
                        <th style="text-align: center;">Date</th>
                        <th style="">Actions</th>

                    </tr>
                </thead>
                @foreach ($data as $item )
                <tbody>
                    <tr>
                        <?php
                            $data = DB::table('class_rearranges')->get('isBooked');
                            //dd($data);
                             $status=$data->pluck('isBooked')[0];

                             //$room = $data->pluck('room_no')[0];
                             //dd($status);

                            ?>

                        <td style="text-align: center;">{{$item->time}}</td>

                        <td style="text-align: center;">{{$item->room_no}}</td>

                        <td style="text-align: center;">{{$item->slot}}</td>

                        <td style="text-align: center;">{{$item->date}}</td>

                        @if($item->isBooked==0)
                        <td><a class="btn btn-primary btn-sm mr-3" href="{{route('BookRoom',$item->id)}}">Book</a></td>
                        @else
                      <td>  <span class=" badge badge-success">Room {{$item->room_no}} Booked</span></td>
                        @endif






                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
</div>
@endsection
