@extends('layouts.member.layout')
@section('content')
    @include('layouts.member.header')
    <div class="container">

        <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Event</th>

                </tr>
                </thead>
                <tbody>

                @foreach ($events as $event)

                    <tr>


                        <td>
                            <div class="box box-shadow">{{ $event->name }}<br>
                                {{ $event->description }}<br>
                                {{ $event->posted_by }}
                                {{ $event->modified_by }}<br>
                                {{ $event->paid== 1 ? 'General' : 'Special'}}<br>
                                {{ $event->status== 1 ? 'Active' : 'Inactive'}}
                                {{ $event->end_date }}<br>
                                <div class="form-actions">
                                    <a href="{{URL::to('/member/userjoins/'.$event->id)}}"
                                       class="btn btn-warning btn-rounded">Sign Up</a>
                                </div>
                            </div>

                        </td>



                        {{--<td><a href="{{URL::to('/eventdelete', $event->eventId)}}"
                        class="btn btn-warning btn-rounded">Delete</a></td>--}}
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>


@endsection
