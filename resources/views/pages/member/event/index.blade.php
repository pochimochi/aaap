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
            <div class="container">
                <div class="col-lg-12">
                    <div class="container" align="right">
                        <form action="{{action('EventController@searching')}}" method="post">
                            @csrf
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
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
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card shadow">
                            @foreach ($events as $event)
                                <div class="card-body">
                                    <a class="display-4 mb-0"
                                       href="{{URL::to('member/events/'. $event->id)}}">{{ $event->name}}
                                    </a>
                                    <small>
                                        @if($event->paid == 0)
                                            <span class="badge badge-danger float-right mt-1">Paid Event</span>
                                        @else
                                            <span class="badge badge-success float-right mt-1">Free Event</span>
                                        @endif
                                    </small>
                                    </br>
                                    <small class="text-muted"><b> Posted
                                            By: </b> {{ $event->user->firstname . ' ' . $event->user->lastname}}
                                        on {{ \Carbon\Carbon::parse($event->created_at)->format('d/m/Y')}}
                                    </small>
                                    </br>
                                    @if($event->modified_by != 0)
                                        <small class="text-muted"><b>Modified
                                                By: </b> {{ App\User::find($event->modified_by)->firstname . ' ' . $event->user->lastname}}
                                            on {{ \Carbon\Carbon::parse($event->updated_at)->format('d/m/Y')}}
                                        </small>
                                        &nbsp;@endif
                                    <small>
                                        <br>
                                        @if (session('role') != 4)
                                            @if($event->status == 0)
                                                <span class="badge badge-danger float-right mt-1">Archived</span>
                                            @else
                                                <span class="badge badge-success float-right mt-1">Active</span>
                                            @endif
                                        @endif
                                    </small>
                                    <br>
                                    <div class="lg-space"></div>
                                    @if($event->image_id != 0)
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="{{asset('/storage/'.$event->image->location)}}"
                                                     class="avatar img-circle img-thumbnail"
                                                     alt="avatar"></div>
                                            <div class="col-lg-6">
                                                <small class="text-muted">
                                                    <b>Category: </b>@php echo $event->category_id== 1 ? 'Public' : 'Seminar' @endphp
                                                </small>
                                                <br>
                                                <small class="text-muted">
                                                    <b>Duration: </b>@php echo $event->start_date @endphp
                                                    to @php echo $event->end_date @endphp</small>
                                                <br>
                                                <small class="text-muted"><b> Venue:</b> {{ $event->venue}}
                                                </small>
                                                <br>
                                                @if($event->paid == 0)
                                                    <small class="text-muted">
                                                        <b>Rate: </b>@php echo $event->rate @endphp</small>
                                                @endif
                                                <br>
                                                <p>@php echo $event->description @endphp</p>
                                            </div>
                                        </div>
                                    @else()
                                        <small class="text-muted">
                                            <b>Category: </b>@php echo $event->category_id== 1 ? 'Public' : 'Seminar' @endphp
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            <b>Duration: </b>@php echo $event->start_date @endphp
                                            to @php echo $event->end_date @endphp</small>
                                        <br>
                                        <small class="text-muted"><b> Venue:</b> {{ $event->venue}}
                                        </small>
                                        @if($event->paid == 0)
                                            <small class="text-muted">
                                                <b>Rate: </b>@php echo $event->rate @endphp</small>
                                            <br>
                                        @endif
                                        <br>
                                        <p>@php echo $event->description @endphp</p>
                                    @endif
                                    <div class="row justify-content-end">
                                        <div class="form-actions">
                                            <a href="{{URL::to('/member/userjoins/'.$event->id)}}"
                                               class="btn btn-primary btn-rounded">Sign Up</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <br>
                    </div>
                    <div class="col-5">
                        <p class="text-white">
                            There are {{\App\Event::count()}} events
                        </p>
                    </div>
                    <div class="col-5 align-self-end">
                        {{$events->links()}}
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
