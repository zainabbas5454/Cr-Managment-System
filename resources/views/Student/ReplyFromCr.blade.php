
@extends('layouts.student')
@section('content')
<div class="container-fluid">
    @if(Session::has('success'))
    <div class="alert alert-success">  {{session('success')}}</div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-success">  {{session('error')}}</div>
    @endif
    <h1 style="text-align: center">Messages From CR</h1>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Description</th>

                        <th>Action</th>
                    </tr>
                </thead>
                 @foreach ($data as $item )
                <tbody>
                    <tr>
                        <td>{{$item->subject}}</td>
                        <td>{{$item->description}}</td>

                        <td colspan="2"><a class="btn btn-danger btn-sm " href="{{route('DeleteMsgFromCR',$item->id)}}">Delete</a>


                    </tr>
                </tbody>
                @endforeach

            </table>
            <span>
                {{$data->links()}}
            </span>
            <style>
                .w-5{
                    display: none;
                }
            </style>
        </div>
      </div>

</div>
@endsection


