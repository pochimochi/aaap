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
            <div class="container justify-content-center">
                <div class="col-12">
                    <div class="card mt-5 shadow">
                        <div class="card-body">
                            <a class="display-4 mb-0" href="{{URL::to('member/events/'. $event->id)}}">
                                {{ $event->name }}
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
                            @if($event->image)
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div id="carouselExampleFade" class="border carousel slide carousel-fade"
                                             data-ride="carousel">
                                            <div class="carousel-inner">
                                                @php $i = 0 @endphp
                                                @foreach($event->image as $name)
                                                    <div class="carousel-item @if($i == 0) active @endif">
                                                        <img src="{{asset('/storage/'.$name->location)}}"
                                                             style="object-fit: scale-down"
                                                             class="d-block w-100" height="250" alt="">
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
                                        <small class="text-muted">
                                            <b>Category: </b>{{$event->category_id== 1 ? 'Public' : 'Seminar' }}
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            <b>Duration: </b>{{\Carbon\Carbon::parse($event->start_date)->toDayDateTimeString()}}
                                            to {{\Carbon\Carbon::parse($event->end_date)->toDayDateTimeString() }}
                                        </small>
                                        <br>
                                        <small class="text-muted"><b> Venue:</b> {{ $event->venue}}
                                        </small>
                                        <br>
                                        @if($event->paid == 0)
                                            <small class="text-muted">
                                                <b>Rate: </b>{{$event->rate}}</small>
                                        @endif
                                        <br>
                                        <p>{{$event->description }}</p>
                                    </div>
                                </div>
                            @else()
                                <small class="text-muted">
                                    <b>Category: </b>{{$event->category_id== 1 ? 'Public' : 'Seminar' }}
                                </small>
                                <br>
                                <small class="text-muted">
                                    <b>Duration: </b>{{\Carbon\Carbon::parse($event->start_date)->toDayDateTimeString()}}
                                    to {{\Carbon\Carbon::parse($event->end_date)->toDayDateTimeString() }}</small>
                                <br>
                                <small class="text-muted"><b> Venue:</b> {{ $event->venue}}
                                </small>
                                @if($event->paid == 0)
                                    <small class="text-muted">
                                        <b>Rate: </b>{{$event->rate}}</small>
                                    <br>
                                @endif
                                <br>
                                <p>{{$event->description }}</p>
                            @endif
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><b> Posted
                                    By: </b> {{ $event->user->firstname . ' ' . $event->user->lastname}}
                                on {{ \Carbon\Carbon::parse($event->created_at)->format('F d, Y')}}
                            </small>
                            </br>
                            @if($event->modified_by != 0)
                                <small class="text-muted"><b>Modified
                                        By: </b> {{ App\User::find($eventt->modified_by)->firstname . ' ' . App\User::find($event->modified_by)->lastname}}
                                    on {{ \Carbon\Carbon::parse($event->updated_at)->format('F d, Y')}}
                                </small>a
                                &nbsp;@endif
                            <div class="row justify-content-end">
                                @if((\App\EventAttendance::all()->where('user_id','=', session('user')['id'])->where('status', 1)->count()) < 1)
                                    <div class="col-md-4">
                                        <form action="{{action('AttendanceController@join')}}"
                                              method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$event->id}}">
                                            <button type="button"
                                                    class="btn btn-block btn-info mb-1"
                                                    data-toggle="modal"
                                                    data-target="#notification{{$event->id}}">Sign Up
                                            </button>
                                            <div class="modal fade" id="notification{{$event->id}}"
                                                 tabindex="-1" role="dialog"
                                                 aria-labelledby="modal-notification"
                                                 aria-hidden="true">
                                                <div
                                                    class="modal-dialog modal-danger modal-dialog-centered modal-"
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
                                                                <h4 class="heading mt-4">Important Reminder!</h4>
                                                                <p>Deposit payment to Association for Adults with Autism Philippines (Bank of the Philippine Island c/a #0401.0099.49).
                                                                    For check payments, please spell out and write the complete name: Association for Adults with Autism, Philippines. Send scanned deposit
                                                                    slip to aspecialplacealfonso@gmail.com or send a screenshot image of the online transfer confirmation of transaction to FB Messenger of AAAP
                                                                    (@adultautismphil.com). An acknowledgment email will be sent to confirm receipt of payment.</p>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                    class="btn btn-white">
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
                                    <nobr>
                                        <div class="" align="right">
                                            <button type="button" class="btn btn-danger"
                                                    data-toggle="modal"
                                                    data-target="#cancel{{$event->id}}">Cancel Participation
                                            </button>
                                            <a class="btn btn-rounded btn-primary"
                                               href="{{URL::to('/member/events')}}">Back</a>
                                        </div>

                                        <div class="modal fade" id="cancel{{$event->id}}"
                                             tabindex="-1" role="dialog"
                                             aria-labelledby="modal-notification"
                                             aria-hidden="true">

                                            <form action="{{action('AttendanceController@cancel')}}"
                                                  method="post">
                                                @csrf
                                                <input type="hidden" name="eventid"
                                                       value="{{$event->id}}">
                                                <div
                                                    class="modal-dialog modal-danger modal-dialog-centered modal-"
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
                                                                <h4 class="heading mt-4">Are you
                                                                    sure?</h4>
                                                                <p>Cancelling would remove your
                                                                    attendance to this event.</p>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                    class="btn btn-white">
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


                                    </nobr>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
