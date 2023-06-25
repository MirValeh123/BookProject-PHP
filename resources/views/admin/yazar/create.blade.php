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
                            <h4 class="card-title">Add Author</h4>
                            <p class="card-category">Create Author</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{ route('admin.yazar.create.post') }}"
                                method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Author Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Image</label>
                                            <input type="file" name="image" style="opacity: 1;position:initial" >
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Bio</label>
                                            <textarea name="bio" id="" cols="30" rows="10" class="form-control" ></textarea>
                                        </div>
                                        
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Add</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
