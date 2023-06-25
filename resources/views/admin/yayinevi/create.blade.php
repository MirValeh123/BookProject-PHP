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
                            <h4 class="card-title">Add Publisher</h4>
                            <p class="card-category">Add New Publisher</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.yayinevi.create.post') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Publisher name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary pull-right"> Add</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="../assets/img/faces/marc.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                            <h4 class="card-title">Alec Thompson</h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I
                                love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
