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
                                action="{{ route('api.book.edit.post', ['id' => $data[0]['id']]) }}" method="POST">
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
                                                <input type="file" name="image" class="form-control"
                                                    value="{{ $data[0]['image'] }}">
                                            </div>

                                            <div class="form-group">
                                                <label class="bmd-label-floating">Image</label>
                                                <input value="{{old($data[0]['image'])}}" type="file" name="image" style="opacity: 1;position:initial" >
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Fiyat</label>
                                                <input value="{{old($data[0]['fiyat'])}}" type="text" name="fiyat" style="opacity: 1;position:initial" >
                                            </div>

                                        </div>
                                        

                                    </div>
                                @else
                                <div class="row">
                                    
                                    <p>Resim yok!</p><br><br>
                                    <input type="file" name="image" >
                                </div>
                                
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="aciklama" class="form-control"
                                                value="{{ $data[0]['aciklama'] }}">
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
                                        <div class="form-group label-floating is-empty">
                                            <h3>Yayinevi</h3>
                                            <select name="yayineviId" id="" class="custom-select">
                                                @foreach ($yayinevi as $key => $value)
                                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>

                                        </div>


                                    </div>

                                </div><div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <h3>kateqori</h3>
                                            <select name="kateqoriId" id="" class="custom-select">
                                                @foreach ($kateqori as $key => $value)
                                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>

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
