@extends('layouts.master.admin')
@section('header')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
@endsection
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('content')
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="display-4 mb-0"
                               href="{{URL::to('/contentmanager/events/'. $event->id.'')}}">
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
                                on {{ \Carbon\Carbon::parse($event->created_at)->format('F d, Y')}}
                            </small>
                            </br>
                            @if($event->modified_by != 0)
                                <small class="text-muted"><b>Modified
                                        By: </b> {{ App\User::find($event->modified_by)->firstname . ' ' . $event->user->lastname}}
                                    on {{ \Carbon\Carbon::parse($event->updated_at)->format('F d, Y')}}
                                </small>
                                &nbsp;@endif
                            <br>
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
                            @if($event->image)
                                <div class="row">
                                    <div class="col-lg-6">
                                         <div id="carouselExampleFade" class="border carousel slide carousel-fade"
                                              data-ride="carousel">
                                             <div class="carousel-inner">
                                                 @php $i = 0 @endphp
                                                 @foreach($event->image as $name)

                                                     <div class="carousel-item @if($i == 0) active @endif">
                                                         <img src="{{asset('/storage/'.$name->location)}}" style="object-fit: scale-down"
                                                              class="d-block w-100" height="250" alt="no-image">
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
                                            to {{\Carbon\Carbon::parse($event->end_date)->toDayDateTimeString()}}</small>
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
                                    <b>Duration: </b>{{$event->start_date }}
                                    to{{$event->end_date }}</small>
                                <br>
                                <small class="text-muted"><b> Venue:</b> {{ $event->venue}}
                                </small>
                                @if($event->paid == 0)
                                    <small class="text-muted">
                                        <b>Rate: </b>{{$event->rate }}</small>
                                    <br>
                                @endif
                                <br>
                                <p>{{$event->description }}</p>
                            @endif
                            <div class="row justify-content-end">
                                <a href="{{URL::to('contentmanager/events/' . $event->id .'/edit')}}"
                                   class="btn btn-info btn-rounded">Edit</a>
                                <a class="btn btn-danger"
                                   href="{{URL::to('/contentmanager/events/create')}}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

