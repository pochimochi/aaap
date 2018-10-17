@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    {{$announcement->title}}
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
                    <a class="text-muted"
                       href="{{URL::to('/contentsmanager/announcements/'. $announcement->id.'')}}">
                        {{ $announcement->title}}
                    </a>
                    <small>
                        @if (session('role') != 4)
                            @if($announcement->status_id == 0)
                                <span class="badge badge-danger float-right mt-1">Archived</span>
                            @else
                                <span class="badge badge-success float-right mt-1">Active</span>
                            @endif
                        @endif
                    </small>
                </h3>
                @if($announcement->image_id != 0)
                    <div class="row">
                        <div class="col-lg-6"><img
                                    src="{{asset('/storage/'.$announcement->image->location)}}"
                                    class="" height="100"
                                    alt="avatar"></div>
                        <div class="col-lg-6">
                            <p class="card-text">@php echo $announcement->description @endphp</p>
                        </div>
                    </div>
                    &nbsp;
                @else()
                    <p class="card-text">@php echo $announcement->description @endphp</p>
                @endif
            </div>
            <div class="card-footer">
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


                <div class="row justify-content-end">
                    <a class="btn btn-rounded btn-primary"
                       href="{{URL::to('/contentmanager/announcements/create')}}">Back</a>
                </div>
            </div>

        </div>
    </div>


@endsection
