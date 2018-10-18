@extends('layouts.member.layout')
@section('content')
    @include('layouts.member.header')
    <div class="row justify-content-center">
        <div class="col-lg-8">
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
            @foreach ($events as $event)
                <div class="box box-shadow">{{ $event->name }}<br>
                    <small class="text-muted">Posted
                        By: {{ $event->user->firstname . ' ' . $event->user->lastname}}
                        on {{$event->created_at}}</small>
                    <br>
                    {{ $event->description }}
                    {{ $event->modified_by }}<br>
                    {{ $event->paid== 1 ? 'General' : 'Special'}}<br>
                    {{ $event->end_date }}<br>
                    <div class="form-actions">
                        <a href="{{URL::to('/member/usercancels/'.$event->id)}}"
                           class="btn btn-warning btn-rounded">Cancel</a>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="text-white">
            There are {{\App\Event::count()}} events
        </p>
    </div>
    <div class="col-8 align-self-end">
        {{$events->links()}}
    </div>
@endsection
