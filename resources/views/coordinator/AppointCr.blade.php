@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <main>
        <h1 style="text-align: center">Appoint CR</h1>
        <div class="container">
            <div class="d-flex justify-content-center">
            <form class="form-inline mt-5" action="{{route('getCrData')}}">

                <div class="form-group ml-5">
                    <label for="department">Select Department</label>
                    <select name="department" class="form-control ml-3">
                        <option value="CS">CS</option>
                        <option value="ME">ME</option>
                        <option value="CE">CE</option>
                        <option value="BBA">BBA</option>
                        <option value="BAF">BAF</option>
                        <option value="SE">SE</option>
                        <option value="EE">EE</option>
                    </select>
                </div>

                <div class="form-group ml-5">
                    <label for="semester">Select Semester</label>
                    <select name="semester" class="form-control ml-3">
                        <option value="1st">1</option>
                        <option value="2nd">2</option>
                        <option value="3rd">3</option>
                        <option value="4th">4</option>
                        <option value="5th">5</option>
                        <option value="6th">6</option>
                        <option value="7th">7</option>
                        <option value="8th">8</option>
                    </select>
                </div>

                <div class="form-group ml-5">
                    <label for="section">Select Section</label>
                    <select name="section" class="form-control ml-3">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary ml-5">Submit</button>
            </form>
            </div>
        </div>

        <div class="container-fluid">
            @if (\Session::has('success'))
            <div class="alert alert-success">
                {{session('success')}}

            </div>
            @endif
            @if($student->count()==0)
            <div class="alert alert-danger">No students record of given input</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Registration Number</th>
                        <th>Name</th>
                        <th>Section</th>
                        <th>Semester</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($student as $data )
                <tbody>
                    <tr>
                        <td>{{$data->regno}}</td>
                        @if($data->name!=Auth::user()->name)
                        <td>{{$data->name}}</td>
                        @endif
                        <td>{{$data->section}}</td>
                        <td>{{$data->semester}}</td>
                        <td>{{$data->department}}</td>
                         @if($data->name!=Auth::user()->name && $data->role_id!=1)
                        <td colspan="2"><a class="btn btn-danger btn-sm mr-3" href="{{route('UpdateCr',$data->id) }}">Appoint Cr</a><a class="btn btn-success btn-sm mr-3" href="{{route('EditUser',$data->id)}}">Edit</a></td>
                         @endif
                         @if($data->role_id==1)
                         <td colspan="2"><a class="btn btn-success btn-sm mr-3" href="{{route('RemoveCr',$data->id)}}">Remove Cr</a><a class="btn btn-success btn-sm mr-3" href="{{route('EditUser',$data->id)}}">Edit</a></td>
                         @endif

                    </tr>
                </tbody>
                @endforeach

            </table>


        </div>

    </main>

</div>
@endsection
