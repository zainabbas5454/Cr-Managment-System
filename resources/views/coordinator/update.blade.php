@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <main>
        <div class="container">
            <h1 style="text-align: center;">Update Student Data</h1>
            @if (\Session::has('success'))
            <div class="alert alert-success">
                {{session('success')}}

            </div>
            @endif
            <form method="POST" action="{{route('UpdateUser')}}" class="p-3">
                @csrf
                <input type="hidden" name="id" value="{{$data['id']}}">
                <input type="hidden" name="role_id" value="3">
                <div class="container my-2">
                    <span class="label-input100">Registration Number</span>
                    <div class="row">
                        <div class="col-md-4">
                            <select name="batch" class="form-group col-12">
                                <option value="Fa10">Fa20</option>
                                <option value="Sp20">Sp20</option>
                                <option value="Fa19">Fa19</option>
                                <option value="Sp19">Sp19</option>
                                <option value="Fa18">Fa18</option>
                                <option value="Sp18">Sp18</option>
                                <option value="Fa17">Fa17</option>
                                <option value="Sp17">Sp17</option>
                                <option value="Fa16">Fa16</option>
                                <option value="Sp16">Sp16</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="program" class="form-group col-12">
                                <option value="BCS">BCS</option>
                                <option value="BSE">BSE</option>
                                <option value="BEE">BEE</option>
                                <option value="BBA">BBA</option>
                                <option value="BAF">BAF</option>
                                <option value="BME">BME</option>
                                <option value="BCE">BCE</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="reg" value="{{$data->reg}}"  required>
                        </div>
                    </div>
                    </div>
                <div class=" form-group">
                    <label>Name</label>
                    <input type="text" class=" form-control" name="name" value="{{$data->name}}" placeholder="Enter your name...">
                    @if($errors->has('name'))
                    <p class=" text-danger">
                        {{$errors->first('name')}}
                    </p>
                    @endif
                </div>
                <div class=" form-group">
                    <label>Email</label>
                    <input type="email" class=" form-control" name="email" value="{{$data->email}}" placeholder="Enter your email...">
                </div>


                <div class=" form-group">
                    <label>Section</label>
                    <select name="section" class="form-group col-12">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>

                </div>
                <div class=" form-group">
                    <label>Semester</label>
                    <select class=" form-control" name="semester">
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                        <option value="6th">6th</option>
                        <option value="7th">7th</option>
                        <option value="8th">8th</option>
                        <option value="9th">9th</option>
                        <option value="10th">10th</option>
                        <option value="11th">11th</option>
                        <option value="12th">12th</option>
                    </select>
                </div>
                <div class=" form-group">
                    <label>Department</label>
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
<button type="submit" class=" btn btn-info">
                        Submit
                    </button>

            </form>
        </div>

    </main>

</div>
@endsection
