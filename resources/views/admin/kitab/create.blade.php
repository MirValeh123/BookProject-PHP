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
                            <h4 class="card-title">Add Book</h4>
                            <p class="card-category">Create Book</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{ route('admin.kitab.create.post') }}"
                                method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Book Title</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Image</label>
                                            <input type="file" name="image" style="opacity: 1;position:initial">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price</label>
                                            <input type="text" name="fiyat" style="opacity: 1;position:initial">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <textarea name="aciklama" id="" cols="30" rows="10" class="form-control"></textarea>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <h3>Author</h3>
                                            <select name="yazarId" id="" class="custom-select">
                                                @foreach ($yazar as $key => $value)
                                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>

                                        </div>


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Publisher</h3>

                                        <div class="form-group label-floating is-empty">
                                            <select name="yayineviId" id="" class="custom-select" >
                                                @foreach ($yayinevi as $key => $value)
                                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>

                                        </div>


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Category </h3>

                                        <div class="form-group label-floating is-empty">
                                            <select name="kateqoriId" id="" class="custom-select" >
                                                @foreach ($kateqori as $key => $value)
                                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>

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
