@extends('layouts.app')
@section('content')
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li class="active">{{ $data[0]['name'] }}</li>
                </ol>
            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="alert  alert-success" style="width:60%;margin-left:380px " id="alert">
            {{ session('status') }}


        </div>
    @endif

    <script type="text/javascript">
        setTimeout(() => {
            let get = document.getElementById('alert');
            get.style.display = 'none';
        }, 2000);
    </script>
    <!--end-breadcrumbs-->
    <!--start-single-->
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-11 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-5 single-top-left">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="{{ asset('images/s-1.jpg') }}">
                                        <div class="thumb-image"> <img src="{{ asset('images/' . $data[0]['image']) }}"
                                                data-imagezoom="true" class="img-responsive" alt="" /> </div>
                                    </li>

                                </ul>
                            </div>

                        </div>
                        <div class="col-md-7 single-top-right">
                            <div class="single-para simpleCart_shelfItem">
                                <h2>{{ $data[0]['name'] }}</h2>
                                <div class="star-on">
                                    <ul class="star-footer">
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                    </ul>
                                    <div class="review">
                                        {{-- <p> {{ $data[0]->comments->count() }} customer review </p> --}}

                                    </div>
                                    <div class="clearfix"> </div>
                                </div>

                                <h5 class="item_price">$ {{ $data[0]['fiyat'] }}</h5>
                                <p>{{ $data[0]['aciklama'] }}</p>

                                <ul class="tag-men">
                                    <li><span>@lang('messages.category')</span>
                                        <span
                                            class="women1">{{ App\Models\Kateqoriler::getField($data[0]['kateqoriId'], 'name') }}</span>
                                    </li>
                                    <li><span>@lang('messages.publisher')</span>
                                        <span
                                            class="women1">{{ App\Models\YayinEvi::getField($data[0]['yayineviId'], 'name') }}</span>
                                    </li>
                                    <li><span>@lang('messages.author')</span>
                                        <span
                                            class="women1">{{ App\Models\Yazarlar::getField($data[0]['yazarId'], 'name') }}</span>
                                    </li>

                                </ul>
                                <a href="" class="add-cart item_add">@lang('messages.basket')
                                </a>

                            </div>




                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    @if (session('success'))
                        <div>{{ session('success') }}</div>
                    @endif
                    <div class="container">
                        <div class="row">
                            {{-- 
                            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                                <form id="algin-form" method="POST"
                                    action="{{ route('books.store_comment', $data[0]->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <h4>Leave a comment</h4>
                                        <label for="message">Message</label>
                                        <textarea name="content" id=""msg cols="30" rows="5" class="form-control"></textarea>
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" id="post" class="btn">Post
                                            Comment</button>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                        <div class="col-sm-5 col-md-6 col-12 pb-4">
                            <h1>Comments</h1>
                            @include('front.kitap.comment.commentsDisplay', [
                                'comments' => $data[0]->comments,
                                'kitap_id' => $data[0]->id,
                            ])

                            {{-- @foreach ($data[0]->comments as $comment)
                                <div class="comment mt-4 text-justify float-left">
                                   
                                    <h4>{{ $comment->user->name }}</h4>
                                    <span>{{ $comment->created_at }}</span>
                                    <br>
                                    <p>{{ $comment->content }}
                                    </p>
                                </div>
                                <hr>
                            @endforeach --}}
                            <h4>Add comment</h4>
                            <form method="post" action="{{ route('books.store_comment', $data[0]->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="content" id=""msg cols="30" rows="5" class="form-control"></textarea>   
                                    <input type="hidden" name="kitap_id" value="{{ $data[0]->id }}" />
                                    <input type="hidden" name="parent_id" value="{{ $data[0]->parent_id }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add Comment" />
                                </div>
                            </form>
                           




                        </div>
                    </div>

                    <div class="latestproducts">
                        <div class="product-one">
                            @foreach (\App\Models\Kitaplar::inRandomOrder()->limit(3)->get() as $key => $value)
                                <div class="col-md-4 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem" style="height: 550px">
                                        <a href="{{ route('kitap.detay', ['selflink' => $value['selflink']]) }}"
                                            class="mask"><img class="img-responsive zoom-img"
                                                src="{{ asset('images/' . $value['image']) }}" style="height:390px"
                                                alt="" /></a>
                                        <div class="product-bottom"
                                            style="align-items:center;display:flex;flex-direction:column;justify-content:center;height:75px">
                                            <h3>{{ $value['name'] }}</h3>
                                            <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$
                                                    {{ $value['fiyat'] }}</span></h4>
                                        </div>

                                    </div>
                                </div>
                            @endforeach



                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"> </div>
            </div>

        </div>
    </div>
    <!--end-single-->
    <script>
        $('.cd-trigger').on('click', function(event) {
            $('.cd-quick-view').css({
                    "top": topSelected, // this is the selected image top value
                    "left": leftSelected, // this is the selected image left value
                    "width": widthSelected, // this is the selected image width
                }).velocity({
                    //animate the quick view: animate its width and center it in the viewport
                    //during this animation, only the slider image is visible
                    'width': sliderFinalWidth + 'px',
                    'left': finalLeft + 'px', // ($(window).width - sliderFinalWidth)/2,
                    'top': finalTop + 'px', // ($(window).height - slider final height)/2,
                }, 1000, [400, 20])
                .velocity({
                    'width': quickViewWidth + 'px', // 80% of the viewport
                    'left': quickViewLeft + 'px', // 10% of the viewport
                }, 300, 'ease', function() {
                    //show quick view content
                    $('.cd-quick-view').addClass('add-content');
                }).addClass('is-visible');
            //assign .overlay-layer class to the body, assign the .empty-box class to the selected .cd-item
            //...
        });
    </script>
@endsection
