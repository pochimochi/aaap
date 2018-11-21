@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Send Newsletter
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
    <form action="{{URL::to('/writer/newsletter')}}" method="post">
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

                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" name="subject"
                                   value="{{old('subject')}}">
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

                </div>
            </div>
        </div>


        <div class="card mt-5">


            <div class="card-body">
                <div class="container">
                    <div class="card-title"><h3>Users</h3></div>


                    <table id="myTable" class="table-bordered table" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>City</th>
                            <th>Email</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td></td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{($user->gender == 1) ? 'Male' : 'Female'}}</td>
                                <td>{{$user->permanentaddress->city->name}}</td>
                                <td>{{$user->email}}<input type="hidden" name="receiver[][email]" value="{{$user->email}}"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
    </form>


@endsection
