
@extends('layouts.app')

@section('content')

<style>
    .btn-primary{
        background-color: #933225;
        border-color: #a12817;
    }

    .btn-primary:hover, .btn-primary:active, .btn-primary:focus{
        background-color: #a95445;
        border-color: #a12817;
        box-shadow: 0 0 10px #933225;
    }

    .btn-close, .btn-close:active, .btn-primary:focus{
        box-shadow: 0 0 10px #933225;
    }

    body {
        position: relative;
        min-height: 100vh;
        width: 100vw;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        background: url(group2.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        }

    option:hover {
    background-color:#933225;
    border-color: #a12817;
    box-shadow: 0 0 10px #933225;     
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('globals.hello_coach') }}</div>
                <div class="card-body d-grid gap-2">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body text-center">
                    {{ __('globals.message_coach') }}
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                    {{ __('globals.upload') }}
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="newModalLabel">{{ __('globals.new_training') }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                            <div class="modal-body">
                            <form method="POST" action="/trainings" id="newTraining">
                            @csrf()
                                <div class="row mb-3">
                                    <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('globals.ask_level') }}</label>

                                <div class="col-md-6">
                                    <select name="level" id="level" form="newTraining" class="form-control" required autocomplete="new-level">    
                                            <option value=""></option>
                                            <option value="Beginner">{{ __('globals.beginner') }}</option>
                                            <option value="Intermediate">{{ __('globals.intermediate') }}</option>
                                            <option value="Advanced">{{ __('globals.advanced') }}</option>
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="distance" class="col-md-4 col-form-label text-md-end">{{ __('globals.best_km') }}</label>

                                <div class="col-md-6">
                                    <select name="distance" id="distance" form="newTraining" class="form-control" required autocomplete="new-distance">        
                                            <option value=""></option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>   
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="time" class="col-md-4 col-form-label text-md-end">{{ __('globals.weeks_necessary') }}</label>

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
                                 <label for="time" class="col-md-4 col-form-label text-md-end">{{ __('globals.upload_file') }}</label>

                                <div class="col-md-6">
                                <input type="file" name="file_name" accept="application/pdf,application/vnd.ms-excel" />
                                </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >{{ __('globals.cancel') }}</button>
                                    <button id="getTrainingbtn" type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{ __('globals.done') }}</button>
                                </div>
                            </form>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Fin Modal -->
                    

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#indexModal">
                    {{ __('globals.see_all') }}
                    </button>
                    <br>
                    <!-- Modal -->
                    <div class="modal fade" id="indexModal" tabindex="-1" aria-labelledby="indexModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="indexModalLabel">{{ __('globals.all_available') }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                            @php 
                            $trainings=\App\Models\Training::all();
                            @endphp
                            <table id="trainingIndex" class="table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th class=" text-center">{{ __('globals.level') }}</th>
                                        <th class=" text-center">{{ __('globals.distance') }}</th>
                                        <th class=" text-center">{{ __('globals.weeks') }}</th>
                                        <th class=" text-center">{{ __('globals.file') }}</th>
                                        <th class=" text-center">{{ __('globals.action') }}</th>
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
                                        <button type="submit" class="btn btn-primary danger">{{ __('globals.delete') }}</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >{{ __('globals.close') }}</button>  
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
                                            <option value="Beginner">{{ __('globals.beginner') }}</option>
                                            <option value="Intermediate">{{ __('globals.intermediate') }}</option>
                                            <option value="Advanced">{{ __('globals.advanced') }}</option>
                                        
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                 <label for="distance" class="col-md-4 col-form-label text-md-end">{{ __('globals.distance_km') }}</label>

                                <div class="col-md-6">
                                <select name="distance" id="updatedistance" form="updateTraining" class="form-control" required autocomplete="new-distance">
                                            <option value=""></option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                 <label for="time" class="col-md-4 col-form-label text-md-end">{{ __('globals.time_weeks') }}</label>

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
                                 <label for="time" class="col-md-4 col-form-label text-md-end">{{ __('globals.upload_new') }}</label>

                                <div class="col-md-6">
                                <input type="file" name="file_name" accept="application/pdf,application/vnd.ms-excel" />
                                </div>
                                </div>

                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >{{ __('globals.cancel') }}</button>
                                    <button type="submit" class="btn btn-primary" > {{ __('globals.save') }}</button>
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
