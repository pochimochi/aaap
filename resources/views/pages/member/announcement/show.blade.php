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
                                            @if($announcement->image != 0)
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
                                                            By: </b> {{ App\User::find($announcement->modified_by)->firstname . ' ' . App\User::find($announcement->modified_by)->lastname}}
                                                        on {{ \Carbon\Carbon::parse($announcement->updated_at)->format('F d, Y')}}
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
                                                            By: </b> {{ App\User::find($announcement->modified_by)->firstname . ' ' . App\User::find($announcement->modified_by)->lastname}}
                                                        on {{ \Carbon\Carbon::parse($announcement->updated_at)->format('F d, Y')}}
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