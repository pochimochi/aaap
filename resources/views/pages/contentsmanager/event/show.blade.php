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
                                               href="{{URL::to('/member/events/'. $event->id.'')}}">
                                                {{ $event->name }}</a><br>
                                            <small>
                                                @if($event->paid == 0)
                                                    <span class="badge badge-danger float-right mt-1">Paid Event</span>
                                                @else
                                                    <span class="badge badge-success float-right mt-1">Free Event</span>
                                                @endif
                                            </small>
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
                                            <br>
                                            <hr>
                                            @if($event->status == 0)
                                                <div class="alert alert-danger" role="alert">
                                                    This event is currently archived
                                                </div>
                                            @else
                                                <div class="alert alert-info" role="alert">
                                                    This event is currently active
                                                </div>
                                            @endif
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
                                                <a class="btn btn-rounded btn-primary"
                                                   href="{{URL::to('/contentmanager/events/create')}}">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-white">
                                        There are {{\App\Event::count()}} events
                                    </p>
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

