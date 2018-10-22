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
                <div class="row">
                    <div class="card mt-5 col-12 shadow">
                        <div class="card-body">
                            <h3 class="card-title">


                                    {{ $event->name }}
                            </h3>
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
                                        <b>Rate: </b>{{$event->rate}}</small>
                                    <br>
                                @endif
                                <br>
                                <p>{{$event->description }}</p>
                            @endif
                            <hr>
                            <small class="text-muted"><b> Posted
                                    By: </b> {{ $event->user->firstname . ' ' . $event->user->lastname}}
                                on {{ \Carbon\Carbon::parse($event->created_at)->format('F d, Y')}}
                            </small>
                            </br>
                            @if($event->modified_by != 0)
                                <small class="text-muted"><b>Modified
                                        By: </b> {{ App\User::find($event->modified_by)->firstname . ' ' . $event->user->lastname}}
                                    on {{ \Carbon\Carbon::parse($event->updated_at)->format('F d, Y')}}
                                </small>
                                &nbsp;@endif
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
                </div>
            </div>
        </section>
    </div>
@endsection