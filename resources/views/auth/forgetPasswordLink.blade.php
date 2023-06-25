@extends('layouts.app')
<style>
    .header{
        display: none;
    }
    .search-bar{
        display: none;
    }
</style>
@section('content')
    {{-- <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Reset Password</div>
                        <div class="card-body">

                            <form action="{{ route('reset.password.post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail
                                        Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email"
                                            required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required
                                            autofocus>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                                        Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password-confirm" class="form-control"
                                            name="password_confirmation" required autofocus>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> --}}
    <div class="container">
        <div class="row">
            <div class="row" style="margin-bottom: 100px">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Reset Password</h2>
                                <div class="panel-body">

                                    <form action="{{ route('reset.password.post') }}" method="POST">

                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <fieldset>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-envelope color-blue"></i></span>

                                                    <input id="emailInput" placeholder="email address" class="form-control"
                                                        type="email" name="email"
                                                        oninvalid="setCustomValidity('Please enter a valid email address!')"
                                                        onchange="try{setCustomValidity('')}catch(e){}" required="">
                                                </div>

                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon glyphicon glyphicon-lock"></span>

                                                    <input id="emailInput" placeholder="password" class="form-control"
                                                        type="password" name="password">
                                                </div>

                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon  glyphicon glyphicon-lock"></span>

                                                    <input id="emailInput" placeholder="confirm password"
                                                        class="form-control" type="password" name="password_confirmation">
                                                </div>

                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif

                                            <div class="form-group">
                                                <input class="btn btn-lg btn-primary btn-block" value="Reset Password"
                                                    type="submit">
                                            </div>
                                        </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
