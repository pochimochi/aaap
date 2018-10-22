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
                                                @if((\App\EventAttendance::all()->where('user_id','=', session('user')['id'])->where('event_id', $event->id)->where('status', 1)->count()) < 1)
                                                    {{--<div class="form-actions">
                                                        <button type="submit"
                                                                class="btn btn-primary btn-rounded">Sign Up
                                                        </button>
                                                    </div>--}}

                                                    <div class="col-md-4">
                                                        <form action="{{action('AttendanceController@join')}}"
                                                              method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$event->id}}">
                                                            <button type="button" class="btn btn-block btn-info mb-3"
                                                                    data-toggle="modal"
                                                                    data-target="#notification{{$event->id}}">Sign Up
                                                            </button>
                                                            <div class="modal fade" id="notification{{$event->id}}"
                                                                 tabindex="-1" role="dialog"
                                                                 aria-labelledby="modal-notification"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                                     role="document">
                                                                    <div class="modal-content bg-gradient-info">

                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title"
                                                                                id="modal-title-notification">Your
                                                                                attention is required</h6>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-body">

                                                                            <div class="py-3 text-center">
                                                                                <i class="ni ni-bell-55 ni-3x"></i>
                                                                                <h4 class="heading mt-4">You should read
                                                                                    this!</h4>
                                                                                <p>Terms and Conditions.</p>
                                                                            </div>

                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-white">
                                                                                Ok, Got it
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-link text-white ml-auto"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                @else

                                                    <div class="form-actions">
                                                        <button type="button" class="btn btn-block btn-danger mb-3"
                                                                data-toggle="modal"
                                                                data-target="#cancel{{$event->id}}">Cancel Event
                                                        </button>
                                                        <div class="modal fade" id="cancel{{$event->id}}"
                                                             tabindex="-1" role="dialog"
                                                             aria-labelledby="modal-notification"
                                                             aria-hidden="true">

                                                            <form action="{{action('AttendanceController@cancel')}}"
                                                                  method="post">
                                                                @csrf
                                                                <input type="hidden" name="eventid"
                                                                       value="{{$event->id}}">
                                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                                     role="document">
                                                                    <div class="modal-content bg-gradient-danger">

                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title"
                                                                                id="modal-title-notification">Your
                                                                                attention is required</h6>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-body">

                                                                            <div class="py-3 text-center">
                                                                                <i class="ni ni-bell-55 ni-3x"></i>
                                                                                <h4 class="heading mt-4">Are you sure?</h4>
                                                                                <p>Cancelling would remove your attendance to this event.</p>
                                                                            </div>

                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-white">
                                                                                Yes, Cancel it
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-link text-white ml-auto"
                                                                                    data-dismiss="modal">Cancel
                                                                            </button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



                                @endforeach
                        </div>
                    @endif
                    <br>
                </div>
                <div class="row">
                    <div class="col-5 align-self-end">
                        {{$events->links()}}
                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection
