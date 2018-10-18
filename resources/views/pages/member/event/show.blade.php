@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    {{$announcement->title}}
@endsection
@section('header')
    <div class="header bg-gradient-info pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->

            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="card col shadow">
            <div class="card-body">
                <h3 class="card-title">
                    <a class="display-4 mb-0"
                       href="{{URL::to('/member/events/'. $event->id.'')}}">
                        {{ $event->name }}</a>
                </h3>
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
        </div>
        <p class="text-white">
            There are {{\App\Event::count()}} events
        </p>
    </div>
@endsection

