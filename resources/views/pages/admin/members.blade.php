@extends('layouts.master.master')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    function submitForm() {
        $('#submit').trigger("click");
    }
</script>

@section('content')
    <body class="open">
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form id="status" action="{{URL::to('/changeStatus')}}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List of Members</h4>
                            </div>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email Address</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($members as $member)
                                        <tr>
                                            <td>{{ $member->id}}</td>
                                            <td>{{ $member->firstname}}</td>
                                            <td>{{ $member->lastname }}</td>
                                            <td>{{ $member->email}}</td>
                                            <td>{{ \Carbon\Carbon::parse($member->created_at)->format('d/m/Y')}}</td>
                                            <td><a id="btn" type="submit"
                                                   href="{{URL::to('/admin/memberchangeStatus/'. $member->id. '/'.  ($member->active == 1 ? '0' : '1')  .'')}}"
                                                   class="btn {{$member->active == 1 ? 'btn-success' : 'btn-danger'}}">{{$member->active == 1 ? 'Active' : 'Inactive' }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                        <button type="submit" class="positive" name="submit" id="submit" hidden="hidden">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

