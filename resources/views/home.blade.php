<?php
$con = mysqli_connect("localhost", "root", "", "laravel");
$sqlLevel = "Select Distinct level from trainings";
$resLevel = mysqli_query($con, $sqlLevel);

$sqlDistance = "Select Distinct distance from trainings";
$resDistance = mysqli_query($con, $sqlDistance);

$sqlTime = "Select Distinct time from trainings";
$resTime = mysqli_query($con, $sqlTime);


?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome to our App!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body text-center">
                        Have a look at our trainings and choose the one most suitable for You!
                    </div>
                    <br>

                    @php 
                            $trainings=\App\Models\Training::all();
                            @endphp
                            <table id="runnerTrainingIndex" class="table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th class=" text-center">Level</th>
                                        <th class=" text-center">Distance</th>
                                        <th class=" text-center">Weeks</th>
                                        <th class=" text-center">File</th>
                                        <th class=" text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($trainings as $training)
                                <tr>
                                    <td class=" text-center">{{$training->level}}</td>
                                    <td class=" text-center">{{$training->distance}}</td>
                                    <td class=" text-center">{{$training->time}}</td>
                                    <td class=" text-center">{{$training->file_name}}</td>
                                    <td class=" text-center"><button class="btn btn-primary">Open</button></td>
                                    
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


