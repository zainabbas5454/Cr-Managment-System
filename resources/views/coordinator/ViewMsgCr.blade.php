
@extends('layouts.navbar')

@section('content')

@extends('layouts.navbar')

@section('title')
Messages From Cr
@endsection

@section('content')
<div class="container-fluid">
    <h1 style="text-align: center">Messages From Cr</h1>
    @if(Session::has('success'))
    <div class="alert alert-success">  {{session('success')}}</div>
    @endif
    <div class="card">
        <div class="card-header">
            Messages From Cr
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Department</th>
                        <th>Semester</th>
                        <th>Section</th>
                        <th>Roll No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 @foreach ($data as $item )
                <tbody>
                    <tr>
                        <td>{{$item->subject}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->department}}</td>
                        <td>{{$item->semester}}</td>
                        <td>{{$item->section}}</td>
                        <td>{{$item->reg_no}}</td>
                        <td colspan="2"><a class="btn btn-success btn-sm " href="{{route('ReplyFromCoordinator',$item->reg_no)}}">Reply</a>
                        <td colspan="2"><a class="btn btn-danger btn-sm " href="{{route('DeleteMsgCr',$item->id)}}">Delete</a>


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


@endsection
