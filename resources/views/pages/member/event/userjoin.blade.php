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
            <div class="container justify-content-center">
                @if($users->count() != 0)
                    @foreach ($users as $user)
                        <div class="col-12">
                            @if($user->status == 1)
                                <div class="card mt-5 shadow">
                                    <div class="card-body">
                                        <div class="card-title">
                                            {{ $user->event->name }}
                                        </div>
                                        <small class="text-muted">Posted
                                            By: {{ $user->event->user->firstname . ' ' . $user->event->user->lastname}}
                                            on {{$user->event->created_at}}</small>
                                        <br>
                                        {{ $user->event->description }}
                                        {{ $user->event->modified_by }}<br>
                                        {{ $user->event->paid== 1 ? 'General' : 'Special'}}<br>
                                        {{ $user->event->end_date }}<br>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-end">
                                            @if(($user->count()) < 1)
                                                {{--<div class="form-actions">
                                                    <button type="submit"
                                                            class="btn btn-primary btn-rounded">Sign Up
                                                    </button>
                                                </div>--}}

                                                <div class="col-md-4">
                                                    <form action="{{action('AttendanceController@join')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$user->event->id}}">
                                                        <button type="button" class="btn btn-block btn-info mb-3"
                                                                data-toggle="modal"
                                                                data-target="#notification{{$user->event->id}}">Sign Up
                                                        </button>
                                                        <div class="modal fade" id="notification{{$user->event->id}}"
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
                                                            data-target="#cancel{{$user->event->id}}">Cancel Event
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

    <p class="text-white">
        There are {{\App\Event::count()}} events
    </p>




@endsection
