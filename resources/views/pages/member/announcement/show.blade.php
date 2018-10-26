@extends('layouts.member.layout')
@section('navbar')
    @include('layouts.member.header')
    <div class="position-relative">
        <!-- shape Hero -->
        <section class="section section-lg section-shaped pb-250">
            <div class="shape shape-style-1 shape-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lg-space"></div>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a class="display-4 mb-0"
                                               href="{{URL::to('/member/announcements/'. $announcement->id.'')}}">
                                                {{ $announcement->title}}
                                            </a>
                                            <br>
                                            @if($announcement->image_id != 0)
                                                <div class="row">
                                                    <div class="col-lg-6"><img
                                                                src="{{asset('/storage/'.$announcement->image->location)}}"
                                                                class="img-fluid"
                                                                alt="avatar"></div>
                                                    <div class="col-lg-6"><p
                                                                class="card-text">{{$announcement->description }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <small class="text-muted"><b>Posted
                                                        By: </b> {{ $announcement->user->firstname . ' ' . $announcement->user->lastname}}
                                                    on {{ \Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y')}}
                                                </small>
                                                </br>
                                                @if($announcement->modified_by != 0)
                                                    <small class="text-muted"><b>Modified
                                                            By: </b> {{ App\User::find($announcement->modified_by)->firstname . ' ' . $announcement->user->lastname}}
                                                        on: {{ \Carbon\Carbon::parse($announcement->updated_at)->format('d/m/Y')}}
                                                    </small>
                                                    &nbsp;@endif
                                            @else()
                                                <p>{{$announcement->description }}</p>
                                                <hr>
                                                <small class="text-muted"><b>Posted
                                                        By: </b> {{ $announcement->user->firstname . ' ' . $announcement->user->lastname}}
                                                    on {{ \Carbon\Carbon::parse($announcement->created_at)->format('F d, Y')}}
                                                </small>
                                                </br>
                                                @if($announcement->modified_by != 0)
                                                    <small class="text-muted"><b>Modified
                                                            By: </b> {{ App\User::find($announcement->modified_by)->firstname . ' ' . $announcement->user->lastname}}
                                                        on: {{ \Carbon\Carbon::parse($announcement->updated_at)->format('F d, Y')}}
                                                    </small>
                                                    &nbsp;@endif
                                            @endif
                                            <div class="row justify-content-end">
                                                <a class="btn btn-rounded btn-primary"
                                                   href="{{URL::to('/member/announcements/type', '1')}}">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection