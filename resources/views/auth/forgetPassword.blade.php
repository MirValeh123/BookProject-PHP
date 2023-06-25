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
    <div class="container" >
        <div class="row">
            <div class="row" style="margin-bottom: 100px">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('forget.password.post') }}" method="POST">
                                        @csrf
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
                                                <input class="btn btn-lg btn-primary btn-block" value="Send My Password"
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
