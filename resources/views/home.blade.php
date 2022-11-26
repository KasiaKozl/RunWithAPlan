@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome to our App! You'll find great plannings for runners here!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        Let us know a bit about Your running goals and experience so we can offer You the best training plan!
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Take a quick survey
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Runner Survey</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                            <form method="POST" action="/" id="survey">
                                <div class="row mb-3">
                                 <label for="level" class="col-md-4 col-form-label text-md-end">I would describe my current level of fitness as</label>

                                <div class="col-md-6">
                                    <select name="level" id="level" form="survey" class="form-control" required autocomplete="new-level">
                                        <option value="beginner">Beginner</option>
                                        <option value="intermediate">Intermediate</option>
                                        <option value="advanced">Advanced</option>
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                 <label for="distance" class="col-md-4 col-form-label text-md-end">The distance I want to run in km is</label>

                                <div class="col-md-6">
                                    <select name="distance" id="distance" form="survey" class="form-control" required autocomplete="new-distance">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                </div>

                                <div class="row mb-3">
                                 <label for="time" class="col-md-4 col-form-label text-md-end">How many weeks do you have to achieve it?</label>

                                <div class="col-md-6">
                                    <select name="time" id="time" form="survey" class="form-control" required autocomplete="new-time">
                                        <option value="4">4</option>
                                        <option value="8">8</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button id="savebtn" type="submit" class="btn btn-primary submit" onclick="">Save changes</button>
                                </div>
                            </form>
                            </div>
                                
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

<script>

$('#survey').on('submit', function(e){
    e.preventDefault();

    let level = $('#level').val();
    let distance = $('#distance').val();
    let time = $('#time').val();

    $.ajax({
        url: "/forms",
        type: "POST",
        data: {
            "_token": "{{csrf_token()}}",
            level:level,
            distance:distance,
            time:time
        },
        success:function(response){
            console.log("exito");
        },
        error:function(response){
            console.log("ha ido mal");
        },
    });
});

</script>