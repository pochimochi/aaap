@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Edit Article
@endsection
@section('header')
    <div class="header bg-gradient-teal pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->

            </div>
        </div>
    </div>
@endsection
@section('content')
    <body class="open"></body>
    <div class="content">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <div class="form-group">
                        <h3>Send a Newsletter</h3>
                        @if($errors->any())
                            <div class="alert alert-danger">

                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach

                            </div>
                        @endif
                    </div>
                </div>
                <div class="container">
                    <form action="{{URL::to('/writer/newsletter')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" name="subject"
                                   value="{{old('subject')}}">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Receiver Email" name="email"
                                   value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <textarea class="ckeditor" name="body">{{old('body')}}</textarea>
                        </div>
                        <div class="row justify-content-end">
                            <button id="btnSubmit" type="submit" class="btn btn-success">
                                Send Newsletter
                            </button>
                            <button id="btnReset" type="reset" class="btn btn-inverse">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection