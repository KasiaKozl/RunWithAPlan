
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello Coach!</div>

                <div class="card-body d-grid gap-2">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body text-center">
                        What are you here for today:
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Upload a training
                    </button>
                    

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Training</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                            <div class="modal-body">

                            <form method="POST" action="/trainings" id="newTraining">
                            @csrf()
                            
                                <div class="row mb-3">
                                 <label for="level" class="col-md-4 col-form-label text-md-end">This is a training for runners that are:</label>

                                <div class="col-md-6">
                                    <select name="level" id="level" form="newTraining" class="form-control" required autocomplete="new-level">
                                        
                                            <option value=""></option>
                                            <option value="beginner">Beginner</option>
                                            <option value="intermediate">Intermediate</option>
                                            <option value="advanced">Advanced</option>
                                        
                                        
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                 <label for="distance" class="col-md-4 col-form-label text-md-end">It's best for the distance of (in km)</label>

                                <div class="col-md-6">
                                <select name="distance" id="distance" form="newTraining" class="form-control" required autocomplete="new-distance">
                                            
                                            <option value=""></option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                 <label for="time" class="col-md-4 col-form-label text-md-end">How many weeks will it take to complete it?</label>

                                <div class="col-md-6">
                                <select name="time" id="time" form="newTraining" class="form-control" required autocomplete="new-time">
                                        
                                            <option value=""></option>
                                            <option value="4">4</option>
                                            <option value="8">8</option>
                                            <option value="12">12</option>
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                 <label for="time" class="col-md-4 col-form-label text-md-end">Upload Your file</label>

                                <div class="col-md-6">
                                <input type="file" name="file_name" accept="application/pdf,application/vnd.ms-excel" />
                                </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
                                    <button id="getTrainingbtn" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Done!</button>
                                </div>
                            </form>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Fin Modal -->
                    

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#indexModal">
                      See all trainings
                    </button>
                    <br>
                    <!-- Modal -->
                    <div class="modal fade" id="indexModal" tabindex="-1" aria-labelledby="indexModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="indexModalLabel">All Available Trainings</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                           
                            <div class="modal-body">
                            @php 
                            $trainings=\App\Models\Training::all();
                            @endphp
                            <table id="trainingIndex" class="table " style="width:100%">
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
                                    <td class=" text-center">
                                    <a href="/trainings/{{$training->id}}/update" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">Edit</a>
                                   
                                    <form action="/trainings/{{$training->id}}" method='POST'>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary danger">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>

                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                                    
                                </div>
                            
                            </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="updateModalLabel">Update</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                           
                            <div class="modal-body">
                            <form method="POST" action="/trainings/{{$training->id}}" id="updateTraining">
                            {{ csrf_field() }}
                            @method('PUT')
                            
                                <input type="hidden" name="id" id="id" value="{{$training->id}}"/>
                                <div class="row mb-3">
                                 <label for="level" class="col-md-4 col-form-label text-md-end">Level</label>

                                <div class="col-md-6">
                                    <select name="level" id="updatelevel" form="updateTraining" class="form-control"  required autocomplete="new-level">
                                        
                                            <option value=""></option>
                                            <option value="Beginner">Beginner</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Advanced">Advanced</option>
                                        
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                 <label for="distance" class="col-md-4 col-form-label text-md-end">Distance in km</label>

                                <div class="col-md-6">
                                <select name="distance" id="updatedistance" form="updateTraining" class="form-control" required autocomplete="new-distance">
                                            
                                            <option value=""></option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                 <label for="time" class="col-md-4 col-form-label text-md-end">Time in weeks</label>

                                <div class="col-md-6">
                                <select name="time" id="updatetime" form="updateTraining" class="form-control" required autocomplete="new-time">
                                        
                                            <option value=""></option>
                                            <option value="4">4</option>
                                            <option value="8">8</option>
                                            <option value="12">12</option>
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                 <label for="time" class="col-md-4 col-form-label text-md-end">Upload new file</label>

                                <div class="col-md-6">
                                <input type="file" name="file_name" accept="application/pdf,application/vnd.ms-excel" />
                                </div>
                                </div>

                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
                                    <button type="submit" class="btn btn-primary" > Save changes</button>
                                </div>
                            
                            </div>
                                
                            </div>
                        </div>
                    </div>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
