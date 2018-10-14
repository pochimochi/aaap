@extends('layouts.member.layout')
@section('content')
    @include('layouts.member.header')
    <div class="lg-space"></div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @foreach ($announcements as $announcement)
                <div class="box box-shadow">
                    <h3 class="card-title">
                        <a class="text-muted"
                           href="{{URL::to('/member/announcements/'. $announcement->id.'')}}">
                            {{ $announcement->title}}
                        </a>
                        <small>
                            @if (session('role') != 4)
                                @if($announcement->status_id == 0)
                                    <span class="badge badge-danger float-right mt-1">Archived</span>
                                @else
                                    <span class="badge badge-success float-right mt-1">Active</span>
                                @endif
                            @endif
                        </small>
                    </h3>
                    <small class="text-muted">Posted
                        By: {{ $announcement->user->firstname . ' ' . $announcement->user->lastname}}
                        on {{ \Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y')}}</small>
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
                            <div class="col-lg-6"><img src="{{asset('/storage/'.$announcement->image->location)}}"
                                                       class="avatar img-circle img-thumbnail"
                                                       alt="avatar"></div>
                            <div class="col-lg-6"><p class="card-text">@php echo $announcement->description @endphp</p>
                            </div>
                        </div>
                        &nbsp;
                    @else()
                        <p class="card-text">@php echo $announcement->description @endphp</p>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="row justify-content-end">
            {{$announcements->links()}}
        </div>
    </div>
@endsection
