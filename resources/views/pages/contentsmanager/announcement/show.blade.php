@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('header')
    <div class="header bg-gradient-info pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->

            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="card col shadow">
            <div class="card-body">
                <h3 class="card-title">
                    <a class="display-4 mb-0"
                       href="{{URL::to('announcement'. $announcement->id.'')}}">
                        {{ $announcement->title}}
                    </a>
                    <br>
                    <small class="text-muted"><b>Posted
                            By: </b> {{ $announcement->user->firstname . ' ' . $announcement->user->lastname}}
                        on {{ \Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y')}}</small>
                    <br>
                    @if($announcement->modified_by != 0)
                        <small class="text-muted"><b>Modified
                                By: </b> {{ App\User::find($announcement->modified_by)->firstname . ' ' . $announcement->user->lastname}}
                            on: {{ \Carbon\Carbon::parse($announcement->updated_at)->format('d/m/Y')}}
                        </small>
                        &nbsp;@endif
                </h3>
                @if(session('user')->role_id == 3)
                    <hr class="my-3">
                    @if($announcement->status_id == 0)
                        <div class="alert alert-danger" role="alert">
                            <b>This announcement is currently archived</b>
                        </div>
                    @else
                        <div class="alert alert-success" role="alert">
                            <b>This announcement is currently active</b>
                        </div>
                    @endif
                @endif
                @if($announcement->image_id != 0)
                    <div class="row">
                        <div class="col-lg-6"><img
                                    src="{{asset('/storage/'.$announcement->image->location)}}"
                                    class="img img-fluid"></div>
                        <div class="col-lg-6">
                            <p class="card-text">{{$announcement->description }}}</p>
                        </div>
                    </div>
                @else()
                    <p class="card-text">{{$announcement->description }}}</p>
                @endif
                <div class="row justify-content-end">
                    <a class="btn btn-danger"
                       href="{{URL::to('/contentmanager/announcements/create')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
