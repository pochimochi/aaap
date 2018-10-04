@extends('layouts.member.layout')
<style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>



@section('content')
    <div class="cover">
        @include('layouts.member.header')
    </div>
    <div class="asvg">
        <div class="container">
            <form action="{{URL::to('/search')}}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                           placeholder="Search title"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
                </div>
            </form>
            <div class="row justify-content-center">
                @if(isset($announcements))
                    <div class="col-lg-8">
                        @foreach ($announcements as $announcement)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $announcement->title}}</h5>
                                    <small class="text-muted">Posted
                                        By: {{ $announcement->postedBy}}</small>
                                    <p class="card-text">@php echo $announcement->description @endphp</p>
                                    <p class="card-text">
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y')}}</small>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="row justify-content-end">
                {{--{{$announcements->links()}}--}}
            </div>
            /
        </div>
    </div>
@endsection
