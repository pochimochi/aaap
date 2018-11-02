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
            <div class="container" align="right">
                <form action="{{action('EventController@searching')}}" method="post">
                    @csrf
                    <div class="col-4">
                        <div class="input-group">
                            <input type="text" name="search" placeholder="Search" class="form-control">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container" align="left">

                <a class="btn btn-default" href="{{action('AttendanceController@index')}}">Joined Events</a>

            </div>
            <div class="container justify-content-center">
                @if($users->count() != 0)
                    @foreach ($users as $user)
                        <div class="col-12">
                            @if($user->status == 1)
                                <div class="card mt-5 shadow">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            {{ $user->event->name }}
                                        </h3>
                                        <small>
                                            @if($user->event->paid == 0)
                                                <span class="badge badge-danger float-right mt-1">Paid Event</span>
                                            @else
                                                <span class="badge badge-success float-right mt-1">Free Event</span>
                                            @endif
                                        </small>
                                        <br>
                                        @if($user->event->image_id != 0)
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <img src="{{asset('/storage/'.$user->event->image->location)}}"
                                                         class="img-fluid"
                                                         alt="avatar"></div>
                                                <div class="col-lg-6">
                                                    <small class="text-muted">
                                                        <b>Category: </b>{{$user->event->category_id== 1 ? 'Public' : 'Seminar' }}
                                                    </small>
                                                    <br>
                                                    <small class="text-muted">
                                                        <b>Duration: </b>{{$user->event->start_date }}
                                                        to {{$user->event->end_date }}</small>
                                                    <br>
                                                    <small class="text-muted"><b> Venue:</b> {{ $user->event->venue}}
                                                    </small>
                                                    <br>
                                                    @if($user->event->paid == 0)
                                                        <small class="text-muted">
                                                            <b>Rate: </b>{{$user->event->rate }}</small>
                                                    @endif
                                                    <br>
                                                    <p>{{$user->event->description }}</p>
                                                </div>
                                            </div>
                                        @else()
                                            <small class="text-muted">
                                                <b>Category: </b>{{$user->event->category_id== 1 ? 'Public' : 'Seminar' }}
                                            </small>
                                            <br>
                                            <small class="text-muted">
                                                <b>Duration: </b>{{$user->event->start_date }}
                                                to{{$user->event->end_date }}</small>
                                            <br>
                                            <small class="text-muted"><b> Venue:</b> {{ $user->event->venue}}
                                            </small>
                                            @if($user->event->paid == 0)
                                                <small class="text-muted">
                                                    <b>Rate: </b>{{$user->event->rate}}</small>
                                                <br>
                                            @endif
                                            <br>
                                            <p>{{$user->event->description }}</p>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-left">
                                            <small class="text-muted"><b> Posted
                                                    By: </b> {{ $user->event->user->firstname . ' ' . $user->event->user->lastname}}
                                                on {{ \Carbon\Carbon::parse($user->event->created_at)->format('F d, Y')}}
                                            </small>
                                            </br>
                                            @if($user->event->modified_by != 0)
                                                <small class="text-muted"><b>Modified
                                                        By: </b> {{ App\User::find($user->event->modified_by)->firstname . ' ' . $user->event->user->lastname}}
                                                    on {{ \Carbon\Carbon::parse($user->event->updated_at)->format('F d, Y')}}
                                                </small>
                                                &nbsp;@endif
                                        </div>
                                        <div class="row justify-content-end">

                                            <div class="col-md-4">

                                                <button type="button" class="btn btn-block btn-info mb-3"
                                                        data-toggle="modal"
                                                        data-target="#payment{{$user->event->id}}">Reminders
                                                </button>
                                                <div class="modal fade" id="payment{{$user->event->id}}"
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
                                                                    <b>Deposit the event fee at any Bank of the
                                                                        Philippine Island branch or on-line on
                                                                        AAAP's account number: 0401.0099.49</b>
                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">

                                                                <button type="button"
                                                                        class="btn btn-link text-white ml-auto"
                                                                        data-dismiss="modal">Ok, Got it
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-block btn-danger mb-3"
                                                        data-toggle="modal"
                                                        data-target="#cancel{{$user->event->id}}">Cancel
                                                    Participation
                                                </button>
                                                <div class="modal fade" id="cancel{{$user->event->id}}"
                                                     tabindex="-1" role="dialog"
                                                     aria-labelledby="modal-notification"
                                                     aria-hidden="true">

                                                    <form action="{{action('AttendanceController@cancel')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="eventid"
                                                               value="{{$user->event->id}}">
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
                                                                        <p>Cancelling would remove your attendance
                                                                            to this event.</p>
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

                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    <div class="container">
                        <div class="pull-right">
                            {{$users->links()}}
                        </div>

                    </div>
                @else
                    <div class="alert mt-5 alert-default">You have not joined any events.</div>
                @endif

            </div>


        </section>
    </div>

@endsection
