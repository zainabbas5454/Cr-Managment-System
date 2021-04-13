@extends('layouts.Cr-navbar')

@section('content')
    <h1 style="text-align: center">Dashboard</h1>

    <table class="table">
        <thead>
            <tr>
                <th style="text-align: center;">Course Code</th>
                <th style="text-align: center;">Course Name</th>

            </tr>
        </thead>
        @foreach ($result as $item )
        <tbody>
            <tr>
                <td style="text-align: center;">{{$item->code}}</td>

                <td style="text-align: center;"><a href="">{{$item->name}}</a></td>

                @if($isActive->isNotEmpty())
                <td colspan="2"><a class="btn btn-primary btn-sm mr-3" href="">Delete</a>

                @endif





            </tr>
        </tbody>
        @endforeach

    </table>
@endsection


