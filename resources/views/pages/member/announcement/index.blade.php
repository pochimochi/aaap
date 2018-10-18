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
                    <form action="{{action('AnnouncementsController@searching')}}" method="post">
                        @csrf
                        <div class="col-4">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
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
                <div class="col-lg-8">
                    <div class="card shadow">
                        @foreach ($announcements as $announcement)
                            <div class="card-body">
                                <a class="display-4 mb-0"
                                   href="{{URL::to('/member/announcements/'. $announcement->id.'')}}">
                                    {{ $announcement->title}}
                                </a>
                                <br>
                                <small class="text-muted"><b> Posted
                                        By: </b> {{ $announcement->user->firstname . ' ' . $announcement->user->lastname}}
                                    on {{ \Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y')}}
                                </small>
                                </br>
                                @if($announcement->modified_by != 0)
                                    <small class="text-muted"><b>Modified
                                            By: </b> {{ App\User::find($announcement->modified_by)->firstname . ' ' . $announcement->user->lastname}}
                                        on {{ \Carbon\Carbon::parse($announcement->updated_at)->format('d/m/Y')}}
                                    </small>
                                    &nbsp;@endif
                                <div class="lg-space"></div>
                                @if($announcement->image_id != 0)
                                    <div class="row">
                                        <div class="col-lg-6"><img
                                                    src="{{asset('/storage/'.$announcement->image->location)}}"
                                                    class="avatar img-circle img-thumbnail"
                                                    alt="avatar"></div>
                                        <div class="col-lg-6">
                                            <p>@php echo $announcement->description @endphp</p>
                                        </div>
                                    </div>
                                    &nbsp;
                                @else()
                                    <p class="card-text">@php echo $announcement->description @endphp</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5">
                            <p class="text-white">
                                There are {{\App\Announcements::count()}} announcements.
                            </p>
                        </div>
                        <div class="col-5 justify-content-center">
                            {{ $announcements->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
