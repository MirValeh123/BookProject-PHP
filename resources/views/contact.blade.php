@extends('layouts.app')
<style>
    .header {
        display: none;
    }

    .search-bar {
        display: none;
    }
</style>
@section('content')
    <div class="container  mt-5" style="width: 600px;
    margin-bottom: 100px;
}">
        <!-- Success message -->
        @if (Session::has('success'))
            <div class="alert alert-success message">
                {{ Session::get('success') }}
            </div>
        @endif
        <form action="" method="post" action="{{ route('contact.store') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name"
                    id="name">
                <!-- Error -->
                @if ($errors->has('name'))
                    <div class="error">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email"
                    id="email">
                @if ($errors->has('email'))
                    <div class="error">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone"
                    id="phone">
                @if ($errors->has('phone'))
                    <div class="error">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                    id="subject">
                @if ($errors->has('subject'))
                    <div class="error">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message1"
                    rows="4"></textarea>
                @if ($errors->has('message'))
                    <div class="error">
                        {{ $errors->first('message') }}
                    </div>
                @endif
            </div>
            <input type="submit" name="send" value="Submit" class="btn btn-success btn-block">
        </form>
    </div>
    <script type="text/javascript">
        setTimeout(() => {
            let get = document.getElementById('message');
            get.style.display = 'none';
        }, 2000);
    </script>
@endsection
