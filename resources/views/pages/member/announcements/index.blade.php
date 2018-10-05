{{--@extends('layouts.member.layout')--}}
{{--<style>--}}
    {{--.dropdown-content {--}}
        {{--display: none;--}}
        {{--position: absolute;--}}
        {{--background-color: #f9f9f9;--}}
        {{--min-width: 160px;--}}
        {{--box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);--}}
        {{--z-index: 1;--}}
    {{--}--}}

    {{--.dropdown-content a {--}}
        {{--color: black;--}}
        {{--padding: 12px 16px;--}}
        {{--text-decoration: none;--}}
        {{--display: block;--}}
        {{--text-align: left;--}}
    {{--}--}}

    {{--.dropdown-content a:hover {--}}
        {{--background-color: #f1f1f1--}}
    {{--}--}}

    {{--.dropdown:hover .dropdown-content {--}}
        {{--display: block;--}}
    {{--}--}}
{{--</style>--}}


{{--@section('content')--}}
    {{--<div class="cover">--}}
        {{--@include('layouts.member.header')--}}
    {{--</div>--}}
    {{--<div class="lg-space"></div>--}}
    {{--<div class="asvg">--}}
        {{--<div class="container">--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--<div class="row justify-content-center">--}}
            {{--@if(isset($announcements))--}}
                {{--<div class="col-lg-8">--}}
                    {{--@foreach ($announcements as $announcement)--}}
                        {{--<div class="box box-shadow">--}}

                            {{--<h5>{{ $announcement->title}}</h5>--}}
                            {{--<small class="text-muted">Posted--}}
                                {{--By: {{ $announcement->postedBy}}</small>--}}
                            {{--<p class="card-text">@php echo $announcement->description @endphp</p>--}}
                            {{--<p class="card-text">--}}
                                {{--<small class="text-muted">{{ \Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y')}}</small>--}}
                            {{--</p>--}}

                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
        {{--<div class="row justify-content-end">--}}
            {{--{{$announcements->links()}}--}}
        {{--</div>--}}
        {{--/--}}
    {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}

@extends('layouts.member.layout')
@section('content')
    @include('layouts.member.header')
    <div class="container">


        <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Announcement</th>

                </tr>
                </thead>
                <tbody>

                @foreach ($announcements as $announcement)
                    <tr>


                        <td>
                            <div class="box box-shadow">{{ $announcement->title}}<br>
                                {{ $announcement->description}}<br>
                                {{ $announcement->postedBy }}
                                {{ $announcement->modifiedBy }}<br>
                                {{ $announcement->statusId== 1 ? 'Active' : 'Inactive'}}
                                {{ $announcement->dueDate }}<br>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>


@endsection

