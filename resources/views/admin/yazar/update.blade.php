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
                            <h4 class="card-title">Yayin Evi Duzenle</h4>
                            <p class="card-category">{{ $data[0]['name'] }}</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data"
                                action="{{ route('customAdmin.yazar.edit.post', ['id' => $data[0]['id']]) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $data[0]['name'] }}">
                                        </div>



                                    </div>

                                </div>

                                @if ($data[0]['image']!=null)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <img src="{{ asset('images/'.$data[0]['image']) }}" style="height: 100px;width:100px"
                                                    alt="">
                                                
                                                    
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Image</label>
                                                <input value="{{old($data[0]['image'])}}" type="file" name="image" style="opacity: 1;position:initial" >
                                            </div>



                                        </div>

                                    </div>
                                @else
                                <div class="row">
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <p>Resim yok!</p>
                                            <label for="image">Resim:</label>
                                            <input type="file" name="image" >
                                        </div>



                                    </div> --}}
                                    <p>Resim yok!</p><br><br>
                                    <input type="file" name="image" >
                                </div>
                                
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="bio" class="form-control"
                                                value="{{ $data[0]['bio'] }}">
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
