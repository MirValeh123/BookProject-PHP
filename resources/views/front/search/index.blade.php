@extends('layouts.app')
@section('content')
    <!--product-starts-->
    <div class="product">
        <div class="container">
            <div class="product-top">
                @if (session('status'))
                    <div class="alert  alert-danger" style="width:60%;margin-left:380px " id="alert">
                        {{ session('status') }}


                    </div>
                @endif
                {{-- @if ($num != 0) --}}
                <div class="product-one">
                    @foreach ($data as $key=> $value)
                        <div class="col-md-3 product-left">
                            <div class="product-main simpleCart_shelfItem" style="height: 400px">
                                <a href="{{ route('kitap.detay', ['selflink' => $value['selflink']]) }}" class="mask"><img
                                        class="img-responsive zoom-img" src="{{ asset('images/' . $value['image']) }}"
                                        style="height:230px" alt="" /></a>
                                <div class="product-bottom">
                                    <h3>{{ $value['name'] }}</h3>
                                    <p>{{ \App\Models\Yazarlar::getField($value['yazarId'], 'name') }}</p>
                                    <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$
                                            {{ $value['fiyat'] }}</span></h4>
                                </div>
                                {{-- <div class="srch">
                                        <span>-50%</span>
                                    </div> --}}
                            </div>
                        </div>
                    @endforeach


                    <div class="clearfix"></div>
                </div>

                {{-- @else
                        <div class="alert alert-danger">Kitap bulunamadı.....</div>

                @endif --}}


            </div>
        </div>
    </div>
    <!--product-end-->
@endsection
