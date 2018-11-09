@extends('layouts.member.layout')
@section('navbar')
    @include('layouts.member.header')
    <div class="position-relative">
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
            <div class="col-lg-12">
                <div class="container" align="right">
                    @if(Auth::guest())
                        <form action="{{url('announcements/search')}}" method="post">
                            @else
                                <form action="{{action('AnnouncementsController@searching')}}" method="post">
                                    @endif
                                    @csrf
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="ni ni-zoom-split-in"></i></span>
                                                </div>
                                                <input class="form-control" name="search" placeholder="Search Title"
                                                       type="text">
                                                <button type="submit" class="btn btn-success"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                </div>
            </div>
            <div class="container justify-content-center">
                <div class="row">
                    @if($announcements->count() < 1)
                        <div class="col-12">
                            <div class="alert alert-default mt-5">Records not available.<br>
                            </div>
                        </div>
                    @else
                        @foreach ($announcements as $announcement)
                            <div class="col-12">

                                <div class="card mt-5 shadow">
                                    <div class="card-body">
                                        @if(session('user') && Auth::user())
                                            <a class="display-4 mb-0"
                                               href="{{URL::to('/member/announcements/'. $announcement->id.'')}}">
                                                {{ $announcement->title}}
                                            </a>
                                        @else
                                            <div class="display-4">
                                                {{ $announcement->title}}
                                            </div>
                                        @endif
                                        <br>
                                        <br>

                                        <div class="row">
                                            @if($announcement->image->count() > 0)
                                                <div class="col-lg-6">
                                                    <div id="carouselExampleFade"
                                                         class="border carousel slide carousel-fade"
                                                         data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @php $i = 0 @endphp
                                                            @foreach($announcement->image as $name)

                                                                <div
                                                                    class="carousel-item @if($i == 0) active @endif">
                                                                    <img
                                                                        src="{{asset('/public/'.$name->location)}}"
                                                                        style="object-fit: scale-down"
                                                                        class="d-block w-100" height="250" alt="">
                                                                </div>
                                                                @php $i++ @endphp
                                                            @endforeach
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carouselExampleFade"
                                                           role="button"
                                                           data-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselExampleFade"
                                                           role="button"
                                                           data-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col">
                                                <p> {{$announcement->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted"><b>Posted
                                                By: </b> {{ $announcement->user->firstname . ' ' . $announcement->user->lastname}}
                                            on {{ \Carbon\Carbon::parse($announcement->created_at)->format('F d, Y')}}
                                        </small>
                                        <br>
                                        @if($announcement->modified_by != 0)
                                            <small class="text-muted"><b>Modified
                                                    By: </b> {{ App\User::find($announcement->modified_by)->firstname . ' ' . App\User::find($announcement->modified_by)->lastname}}
                                                on {{ \Carbon\Carbon::parse($announcement->updated_at)->format('F d, Y')}}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col justify-content-center">
                    {{ $announcements->links() }}
                </div>
            </div>
        </section>
    </div>


@endsection
