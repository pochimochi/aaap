@extends('layouts.member.layout')
@section('content')
    @include('layouts.member.header')
    <div class="lg-space"></div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @foreach ($announcements as $announcement)
                <div class="box box-shadow">
                    <h5>{{ $announcement->title}}</h5>
                    <small class="text-muted">Posted
                        By: {{ $announcement->user->firstname . ' ' . $announcement->user->lastname}}
                        on {{ \Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y')}}</small>
                    <p class="card-text">@php echo $announcement->description @endphp</p>
                </div>
            @endforeach
        </div>
        {{--<div class="row justify-content-end">--}}
            {{$announcements->links()}}
        {{--</div>--}}
    </div>
@endsection

