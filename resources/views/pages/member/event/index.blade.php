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
            <div class="container justify-content-center">
                <div class="row">
                    @if($events->count() < 1)
                        <div class="col-12">
                            <div class="alert alert-default">No events found<br>
                            </div>
                            @else
                                @foreach ($events as $event)
                                    <form action="{{action('AttendanceController@join')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$event->id}}">

                                        <div class="card mt-5 col-12 shadow">
                                            <div class="card-body">
                                                <a class="display-4 mb-0"
                                                   href="{{URL::to('member/events/'. $event->id)}}">{{ $event->name}}
                                                </a>
                                                <br>
                                                <small>
                                                    @if($event->paid == 0)
                                                        <span class="badge badge-danger float-right mt-1">Paid Event</span>
                                                    @else
                                                        <span class="badge badge-success float-right mt-1">Free Event</span>
                                                    @endif
                                                </small>
                                                <br>
                                                @if($event->image_id != 0)
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <img src="{{asset('/storage/'.$event->image->location)}}"
                                                                 class="img-fluid"
                                                                 alt="avatar"></div>
                                                        <div class="col-lg-6">
                                                            <small class="text-muted">
                                                                <b>Category: </b>{{ $event->category_id== 1 ? 'Public' : 'Seminar' }}
                                                            </small>
                                                            <br>
                                                            <small class="text-muted">
                                                                <b>Duration: </b>{{  $event->start_date }}
                                                                to {{  $event->end_date }}</small>
                                                            <br>
                                                            <small class="text-muted"><b> Venue:</b> {{ $event->venue}}
                                                            </small>
                                                            <br>
                                                            @if($event->paid == 0)
                                                                <small class="text-muted">
                                                                    <b>Rate: </b>{{ $event->rate }}</small>
                                                            @endif
                                                            <br>
                                                            <p>{{   $event->description }}</p>
                                                        </div>
                                                    </div>
                                                @else()
                                                    <small class="text-muted">
                                                        <b>Category: </b>{{ $event->category_id== 1 ? 'Public' : 'Seminar' }}
                                                    </small>
                                                    <br>
                                                    <small class="text-muted">
                                                        <b>Duration: </b>{{ $event->start_date }}
                                                        to {{$event->end_date}} @
                                                    </small>
                                                    <br>
                                                    <small class="text-muted"><b> Venue:</b> {{ $event->venue}}
                                                    </small>
                                                    @if($event->paid == 0)
                                                        <small class="text-muted">
                                                            <b>Rate: </b>{{ $event->rate }}</small>
                                                        <br>
                                                    @endif
                                                    <br>
                                                    <p>{{$event->description }}</p>
                                                @endif
                                                <hr>
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
                                                @endif
                                                <div class="row justify-content-end">
                                                    @if((\App\EventAttendance::all()->where('user_id','=', session('user')['id'])->count()) < 1)
                                                        <div class="form-actions">
                                                            <button type="submit"
                                                                    class="btn btn-primary btn-rounded">Sign Up
                                                            </button>
                                                        </div>
                                                    @else
                                                        <div class="form-actions">
                                                            <a
                                                               class="btn btn-success text-white btn-rounded">You have Signed Up for this Event</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                @endforeach
                            @endif
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-5 align-self-end">
                                {{$events->links()}}
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>



@endsection
