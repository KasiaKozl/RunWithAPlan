@extends('layouts.app')
@section('content')

<style>
    .btn-primary{
        background-color: #933225;
        border-color: #a12817;
    }

    .btn-primary:hover{
        background-color: #a95445;
        border-color: #a12817;
    }

    .form-check-input:focus, .form-control:focus{
        border-color: #a12817;
        box-shadow: 0 0 10px #933225;
    }
    
    .card {
        opacity: 0.9;
    }

    body {
        position: relative;
        min-height: 100vh;
        width: 100vw;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        background: url(solo.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('auth.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('auth.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('auth.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('auth.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('auth.phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" required autocomplete="new-phone">
                            
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role_id" class="col-md-4 col-form-label text-md-end">{{ __('auth.register_as') }}</label>

                            <div class="col-md-6">
                                <select name="role_id" id="role_id" form="registerForm" class="form-control" required autocomplete="new-role_id">
                                     <option value="1">{{ __('auth.coach') }}</option>
                                     <option value="2">{{ __('auth.runner') }}</option>
                                </select>

                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('auth.register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
