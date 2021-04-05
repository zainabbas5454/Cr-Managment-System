@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4" style="text-align: center">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header">Total Students Registered</div>
                <div class="card-body"><h5 class="card-title">Total Students:  {{$total_user}}</h5></div>


            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-header">Computer Science Department</div>
                <div class="card-body"><h5 class="card-title">Total Students:  {{$CS}}</h5></div>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-header">Electrical Engineering Department</div>
                <div class="card-body"><h5 class="card-title">Total Students:  {{$EE}}</h5></div>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-header">Civil Engineering Department</div>
                <div class="card-body"><h5 class="card-title">Total Students:  {{$CE}}</h5></div>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header">BBA Department</div>
                <div class="card-body"><h5 class="card-title">Total Students:  {{$BBA}}</h5></div>


            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-header">BAF Department</div>
                <div class="card-body"><h5 class="card-title">Total Students:  {{$BAF}}</h5></div>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-header">Mechanical Engineering Department</div>
                <div class="card-body"><h5 class="card-title">Total Students:  {{$ME}}</h5></div>

            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-header">Software Engineering Department</div>
                <div class="card-body"><h5 class="card-title">Total Students:  {{$SE}}</h5></div>

            </div>
        </div>
    </div>


</div>
@endsection
