<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book A Ecommerce Category Flat Bootstrap Resposive Website Template | Home :: w3layouts</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <!--Custom-Theme-files-->
    <!--theme-style-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--start-menu-->
    <script src="{{ asset('js/simpleCart.min.js') }}"></script>
    <link href="{{ asset('css/memenu.css') }}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{ asset('js/memenu.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".memenu").memenu();
        });
    </script>
    <!--dropdown-->
    <script src="{{ asset('js/jquery.easydropdown.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style='overflow-x:hidden;'>
    <!--top-header-->
    <div class="top-header">
        <div class="container">
            <div class="top-header-main">
                <div class="col-md-6 top-header-left">
                    <div class="drop">
                        @auth
                            <div class="box">
                                <a style="color: white;text-decoration:none"
                                    href="{{ route('dashboard') }}">{{ Illuminate\Support\Facades\Auth::user()->name }}</a>
                            </div>
                            <div class="box">
                                
                                <div class="box">
                                    <a style="color: white;text-decoration:none" href="{{ route('logout') }}">Logout</a>
                                </div>
                            </div>
                        @endauth
                        @guest
                            <div class="box">
                                <a style="color: white;text-decoration:none" href="{{ route('login') }}">Login</a>
                            </div>
                            <div class="box">
                                <a href="{{ route('register') }}" style="color: white;text-decoration:none">SignUp</a>
                            </div>
                        @endguest
                       

                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-6 top-header-left">
                    <div class="cart box_1">
                        <a href="">
                            <div class="total">
                                <span class=""></span>
                            </div>
                            <img src="images/cart-1.png" alt="" />
                        </a>
                        {{-- <p><a href="javascript:;" class="simpleCart_empty"></a></p> --}}
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--top-header-->
    <!--start-logo-->
    <div class="logo">
        <div class="row">
            <div>
                <a href="{{ route('index') }}">
                    <h1>KITAPDIYARI.COM</h1>
                </a>
            </div>
            <div class="col-md-3 header-right" style="margin-left:700px;margin-top:30px;">
                <div class="search-bar">
                    <form action="{{ route('search') }}">
                        <input type="text" name="q" value="Search" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Search';}">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--start-logo-->
    <!--bottom-header-->
    <div class="header-bottom">
        <div class="container">
            <div class="header">
                <div class="col-md-12 header-left">
                    <div class="top-nav">
                        <ul class="memenu skyblue">
                            <li class="active"><a href="{{ route('index') }}">Home</a></li>
                            {{-- @foreach (\App\Models\Kateqoriler::all() as $key => $value)
                                <li class="grid"><a
                                        href="{{ route('cat', ['selflink' => $value['selflink']]) }}">{{ $value['name'] }}</a>

                                </li>
                            @endforeach --}}
                            <!-- Display Parent and Child Categories as Select Options -->

                            <!-- Display Parent and Child Categories -->
                            <!-- Display Parent and Child Categories as Select Options -->
                            <label for="category">Category:</label>
                            <select class="form-select" name="category" id="category">
                                <option value="">Select a Category</option>
                                @foreach (\App\Models\Kateqoriler::tree() as $category)
                                    <option value="{{ $category->id }}"><a  href="{{ route('cat', ['selflink' => $category['selflink'],'category_id' => $category->id]) }}">{{ $category->name }}</a></option>
                                    @if ($category->children->isNotEmpty())
                                        @include('front.cat.child-categories', [
                                            'children' => $category->children,
                                            'prefix' => '-',
                                        ])
                                    @endif
                                @endforeach
                            </select>







                            {{-- <li class="grid"><a href="typo.html">Blog</a> --}}
                            {{-- </li> --}}
                            <li class="grid"><a href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--bottom-header-->
    @if (session('status'))
        <div class="alert alert-success" id="element">
            {{ session('status') }}
        </div>
    @endif


    @yield('content')
    <!--information-starts-->
    <div class="information">
        <div class="container">
            <div class="infor-top">
                <div class="col-md-3 infor-left">
                    <h3>Follow Us</h3>
                    <ul>
                        <li><a href="#"><span class="fb"></span>
                                <h6>Facebook</h6>
                            </a></li>
                        <li><a href="#"><span class="twit"></span>
                                <h6>Twitter</h6>
                            </a></li>
                        <li><a href="#"><span class="google"></span>
                                <h6>Google+</h6>
                            </a></li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>Information</h3>
                    <ul>
                        <li><a href="#">
                                <p>Specials</p>
                            </a></li>
                        <li><a href="#">
                                <p>New Products</p>
                            </a></li>
                        <li><a href="#">
                                <p>Our Stores</p>
                            </a></li>
                        <li><a href="contact.html">
                                <p>Contact Us</p>
                            </a></li>
                        <li><a href="#">
                                <p>Top Sellers</p>
                            </a></li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>My Account</h3>
                    <ul>
                        <li><a href="account.html">
                                <p>My Account</p>
                            </a></li>
                        <li><a href="#">
                                <p>My Credit slips</p>
                            </a></li>
                        <li><a href="#">
                                <p>My Merchandise returns</p>
                            </a></li>
                        <li><a href="#">
                                <p>My Personal info</p>
                            </a></li>
                        <li><a href="#">
                                <p>My Addresses</p>
                            </a></li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>Store Information</h3>
                    <h4>The company name,
                        <span>Lorem ipsum dolor,</span>
                        Glasglow Dr 40 Fe 72.
                    </h4>
                    <h5>+955 123 4567</h5>
                    <p><a href="mailto:example@email.com">contact@example.com</a></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--information-end-->
    <!--footer-starts-->
    <div class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="col-md-6 footer-left">
                    <form method="POST" action="{{ route('index.post') }}">
                        @csrf
                        <input name="email" type="text" value="Enter Your Email" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
                        <button class="btn btn-success" type="submit">Subscribe</button>
                    </form>
                </div>
                <div class="col-md-6 footer-right">
                    <p>© 2015 Luxury Watches. All Rights Reserved | Design by <a href="http://w3layouts.com/"
                            target="_blank">W3layouts</a> </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--footer-end-->
    <script>
        setTimeout(() => {
            let msg = document.getElementById('element')
            msg.style.display = 'none';
        }, 2000);
    </script>
</body>
