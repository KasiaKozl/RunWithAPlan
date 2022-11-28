
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome to our App!</div>

                <div class="card-body d-grid gap-2">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body text-center">
                        Are you ready for some running?
                    </div>

                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#seeAllModal">
                      See all available trainings
                    </button>

                    <!-- Modal -->
                        <div class="modal fade" id="seeAllModal" tabindex="-1" aria-labelledby="seeAllModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="seeAllModalLabel">All trainings</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                            <div class="modal-body">

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
                                    <td class=" text-center">
                                        <a href="example.pdf" target="_blank">
                                            <button type="button" class="btn btn-primary ">
                                            Open
                                            </button>
                                        </a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


