@extends('layouts.master.master')
<body class="open"></body>
@section('content')
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
                            <input type="email" class="form-control" placeholder="Receiver Email" name="emailAddress"
                                   value="{{old('emailAddress')}}">
                        </div>
                        <div class="form-group">
                            <textarea class="ckeditor" name="body">{{old('body')}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button id="btnSubmit" type="submit" class="btn btn-outline-success">
                                    Send Newsletter
                                </button>

                                <button id="btnReset" type="reset" class="btn btn-outline-danger">
                                    Reset
                                </button>
                            </div>


                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection