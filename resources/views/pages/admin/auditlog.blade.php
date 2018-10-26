@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    System Logs
@endsection
@section('header')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <table id="myTable" class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Description</th>
                        <th>Date Logged</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($auditlog as $a)
                        <tr>
                            <td>{{ $a->id}}</td>
                            <td>{{ $a->users->firstname .' ' .$a->users->lastname}}</td>
                            <td>{{ $a->description }}</td>
                            <td>{{ $a->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>


    </div>
@endsection
