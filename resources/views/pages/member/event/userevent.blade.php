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
                            <div class="box box-shadow">{{ $event->eventName }}<br>
                                {{ $event->eventDescription }}<br>
                                {{ $event->postedBy }}
                                {{ $event->modifiedBy }}<br>
                                {{ $event->isPaid== 1 ? 'General' : 'Special'}}<br>
                                {{ $event->status== 1 ? 'Active' : 'Inactive'}}
                                {{ $event->endDate }}<br>
                                <a href="{{URL::to('/userjoin', $event->eventId)}}"
                                   class="btn btn-warning btn-rounded">Join</a></div>
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
