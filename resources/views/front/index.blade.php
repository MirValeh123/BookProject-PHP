@extends('layouts.app') 
@section('content')
    <!--banner-starts-->
    <div class="bnr" id="home">
        <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider4">
                @foreach (\App\Models\Slider::all() as $key => $value)
                    <li style="display: flex;justify-content:center">
                        <img src="{{ asset('images/' . $value['image']) }}" style="width: 1500px" alt="" />
                    </li>
                @endforeach



            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--banner-ends-->
    <!--Slider-Starts-Here-->
    <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function() {
            // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function() {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!--End-slider-script-->
    <!--about-starts-->
    <div class="about">
        <div class="container">
            <div class="about-top grid-1">
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="images/abt-1.jpg" alt="" />
                        <figcaption>
                            <h2>Nulla maximus nunc</h2>
                            <p>In sit amet sapien eros Integer dolore magna aliqua</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="images/abt-2.jpg" alt="" />
                        <figcaption>
                            <h4>Mauris erat augue</h4>
                            <p>In sit amet sapien eros Integer dolore magna aliqua</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="images/abt-3.jpg" alt="" />
                        <figcaption>
                            <h4>Cras elit mauris</h4>
                            <p>In sit amet sapien eros Integer dolore magna aliqua</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--about-end-->
    <!--product-starts-->
    <div class="product">
        <div class="container">
            <div class="product-top">
                @foreach ($chunks as $chunk)
                    <div class="product-one">
                        @foreach ($chunk as $value)
                            <div class="col-md-4 product-left " style="margin-bottom: 40px">
                                <div class="product-main simpleCart_shelfItem" style="height: 400px">
                                    <a href="{{ route('kitap.detay', ['selflink' => $value['selflink']]) }}"
                                        class="mask"><img class="img-responsive zoom-img"
                                            src="{{ asset('images/' . $value['image']) }}" style="height:230px"
                                            alt="" /></a>
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
                @endforeach

                <!-- Pagination links -->
                <div class="row col-6" style="display:flex;justify-content: center;">
                    {!! $data->links() !!}
                </div>

            </div>
        </div>
    </div>
    <!--product-end-->


@endsection
