@extends('layouts.app')
<style>
    .header-right {
        display: none;
    }
    /* body{
        font-size: 20px!important;
    } */

    .header-bottom {
        display: none;
    }

    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
.card{
    height: 400PX;
}
    #page-content {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<link rel="stylesheet" href="{{ asset('admin_css/assets/auth/dashboard.css') }}">
@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0" style="height: 370PX">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25" style="height: 250px">
                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" style="height: 150px;width:150px" class="img-radius"
                                            alt="User-Profile-Image">
                                    </div>
                                    <h6 class="f-w-600">{{auth()->user()->name}}</h6>
                                    <p>Web Designer</p>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">{{ auth()->user()->email }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Admin Permission</p>
                                            @if (auth()->user()->permission == 1)
                                                
                                            <h6 class="text-muted f-w-400">User is Admin</h6>

                                            @else
                                            <h6 class="text-muted f-w-400">User is not  Admin</h6>

                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email Verify</p>
                                            @if (auth()->user()->is_email_verified == 1)
                                            <h6 class="text-muted f-w-400">Your email is verified!</h6>
                                                
                                            @else
                                            <h6 class="text-muted f-w-400">Your email is not  verified!</h6>

                                                
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Created</p>
                                                

                                            <h6 class="text-muted f-w-400">{{auth()->user()->created_at}}</h6>

                                        </div>
                                    </div>
                                    {{-- <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Recent</p>
                                            <h6 class="text-muted f-w-400">Sam Disuja</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Most Viewed</p>
                                            <h6 class="text-muted f-w-400">Dinoter husainm</h6>
                                        </div>
                                    </div> --}}
                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="facebook" data-abc="true"><i
                                                    class="mdi mdi-facebook feather icon-facebook facebook"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="twitter" data-abc="true"><i
                                                    class="mdi mdi-twitter feather icon-twitter twitter"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="instagram" data-abc="true"><i
                                                    class="mdi mdi-instagram feather icon-instagram instagram"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
