@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-primary">{{ session('status') }}</div>
                    @endif
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Publisher Edit</h4>
                            <p class="card-category">{{ $data[0]['name'] }}</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data"
                                action="{{ route('cutomAdmin.kateqori.edit.post', ['id' => $data[0]['id']]) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $data[0]['name'] }}">
                                        </div>



                                    </div>

                                </div>

                               
                               

                                    
                                

                                <button type="submit" class="btn btn-primary pull-right"> Update</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
