@extends('layouts.app')
@section('content')
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{ route('index') }}">Anasayfa</a></li>
                    <li class="active">Alış Verişi Tamamla</li>
                </ol>

            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--contact-start-->
    <div class="contact">
        <div class="container">
            <div class="contact-top heading">
                <h2>Bilgileri Doldurunuz</h2>
            </div>
            @if (session('status'))
            {{session('status')}}
                
            @endif
            <div class="contact-text">

                <div class="col-md-12 contact-right">
                    <form action="">
                        @csrf
                        <div style="display: flex;justify-content:space-between">
                            <input style="width: 540px" type="text" name="adres" placeholder="Adres   ">
                            <input  style="width: 540px"  type="text" name="telefon" placeholder="Phone">
                        </div>
                        <textarea name="mesaj" placeholder="Message" required=""></textarea>
                        <div class="submit-btn">
                            <input type="submit" value="SUBMIT">
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--contact-end-->
@endsection
