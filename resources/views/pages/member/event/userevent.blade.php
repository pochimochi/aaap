@extends('layouts.member.layout')
@section('content')
    @include('layouts.member.header')

    <div class="row justify-content-center">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="col-lg-8">
            @foreach ($events as $event)
                <div class="box box-shadow">{{ $event->name }}<br>
                    <small class="text-muted">Posted
                    By: {{ $event->user->firstname . ' ' . $event->user->lastname}} on {{$event->created_at}}</small><br>
                    {{ $event->description }}
                    {{ $event->modified_by }}<br>
                    {{ $event->paid== 1 ? 'General' : 'Special'}}<br>
                    {{ $event->end_date }}<br>
                    <div class="form-actions">
                        <a href="{{URL::to('/member/userjoins/'.$event->id)}}"
                           class="btn btn-warning btn-rounded">Sign Up</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
