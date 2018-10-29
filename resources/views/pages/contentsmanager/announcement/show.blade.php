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
                       href=" ">
                        {{ $announcement->title}}
                    </a>
                    <br>
                    <small class="text-muted"><b>Posted
                            By: </b> {{ $announcement->user->firstname . ' ' . $announcement->user->lastname}}
                        on {{ \Carbon\Carbon::parse($announcement->created_at)->format('F d, Y')}}</small>
                    <br>
                    @if($announcement->modified_by != 0)
                        <small class="text-muted"><b>Modified
                                By: </b> {{ App\User::find($announcement->modified_by)->firstname . ' ' . $announcement->user->lastname}}
                            on: {{ \Carbon\Carbon::parse($announcement->updated_at)->format('F d, Y')}}
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
                @if($announcement->image)
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="carouselExampleFade" class="border carousel slide carousel-fade"
                                 data-ride="carousel">
                                <div class="carousel-inner">
                                    @php $i = 0 @endphp
                                    @foreach($announcement->image as $name)

                                        <div class="carousel-item @if($i == 0) active @endif">
                                            <img src="{{asset('/storage/'.$name->location)}}" style="object-fit: scale-down"
                                                 class="d-block w-100" height="250" alt="no-image">
                                        </div>
                                        @php $i++ @endphp
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                                   data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <p class="card-text">{{$announcement->description}}</p>
                        </div>
                    </div>
                @else()
                    <p class="card-text">{{$announcement->description}}</p>
                @endif
                <div class="row justify-content-end">
                    <a class="btn btn-danger"
                       href="{{URL::to('/contentmanager/announcements/create')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
