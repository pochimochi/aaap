@extends('layouts.master.master')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h3>Audit Logs</h3></div>
                <br>
                <table id="myTable" class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>UserID</th>
                        {{-- <th>Body</th>--}}
                        <th>Description</th>
                        <th>Date Logged</th>

                    </tr>
                    </thead>
                    <tbody>


                    @foreach ($auditlog as $a)

                        <tr>
                            <td>{{ $a->id}}</td>
                            <td>{{ $a->users->firstname .' ' .$a->users->lastname}}</td>
                            {{--<td>@php echo substr($article->body, 0, 50) . "..." @endphp</td>--}}
                            <td>{{ $a->description }}</td>
                            <td>{{ $a->created_at}}</td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>


    </div>
@endsection