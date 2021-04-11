@extends('layouts.Cr-navbar')

@section('content')
<h1 style="text-align:center;">Course Registration</h1>
<div class="container-fluid">

    <table class="table">
        <thead>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($data as $item )
        <tbody>
            <tr>
                <td>{{$item->code}}</td>

                <td>{{$item->name}}</td>

                <td>{{$item->department}}</td>

                <td colspan="2"><a class="btn btn-primary btn-sm mr-3" href="">Register</a>


            </tr>
        </tbody>
        @endforeach

    </table>

</div>
@endsection
