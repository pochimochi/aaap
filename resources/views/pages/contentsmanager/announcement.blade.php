@extends('layouts.master.master')

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    function submitForm() {
        $('#submit').trigger("click");
    }
</script>
<script type="text/javascript">

    $('#btnSubmit').on('click', function (e) {
        e.preventDefault();
        var form = $(this).parents('form');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        })
    });

</script>
<body class="fix-header fix-sidebar">
@section('content')
<div class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4>Add Announcement</h4>
                    </div>
                    </br>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="basic-elements">
                            <form action="{{URL::to('/announcementSubmit')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="title" id="title"
                                                       class=" form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Announcement Type</label>
                                                <select class="form-control custom-select input-default"
                                                        name="aTypeId" id="aTypeId">
                                                    <option value="">Select Type</option>
                                                    <option value="1">General</option>
                                                    <option value="0">Special</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control custom-select input-default"
                                                        name="statusId" id="statusId">
                                                    <option value="">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input name="announcementImage" type="file"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control input-default" id="description" rows="3"
                                                          name="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Posted By</label>
                                                <input type="text" name="postedBy" id="postedBy"
                                                       class=" form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Due Date</label>
                                                <input type="date" name="dueDate" id="dueDate"
                                                       class=" form-control input-default" placeholder="dd/mm/yyyy">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input class="btn btn-success btn-rounded" type="submit"
                                           value="Submit">
                                    <input class="btn btn-inverse btn-rounded" type="reset"
                                           value="Cancel">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <form id="status" action="{{URL::to('/changeStatus')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">List of Announcements</h4>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Posted By</th>
                                    {{--<th>Modified By</th>--}}
                                    <th>Date Created</th>
                                    {{--<th>Date Updated</th>--}}
                                    <th>Type</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($announcements as $announcement)
                                    <tr>
                                        <td>{{ $announcement->announcementId }}</td>
                                        <td>{{ $announcement->title }}</td>
                                        <td>{{ $announcement->postedBy }}</td>
                                        {{--<td>{{ $announcement->modifiedBy }}</td>--}}
                                        <td>{{ \Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y')}}</td>
                                        {{--<td>{{ \Carbon\Carbon::parse($announcement->updated_at)->format('d/m/Y')}}</td>--}}
                                        <td>{{ $announcement->aTypeId == 1 ? 'General' : 'Special'}}</td>
                                        <td>{{ \Carbon\Carbon::parse($announcement->dueDate)->format('d/m/Y')}}</td>
                                        <td><a id="btn" type="submit" onclick="confirm('Are you sure?')"
                                               href="{{URL::to('contentmanager/announcements/changeStatus/'. $announcement->announcementId. '/'.  ($announcement->statusId == 1 ? '0' : '1')  .'')}}"
                                               class="btn {{$announcement->statusId == 1 ? 'btn-success' : 'btn-danger'}}">{{$announcement->statusId == 1 ? 'Active' : 'Inactive' }}</a>
                                        </td>
                                        <td><a href="{{URL::to('/contentmanager/announcements/'. $announcement->announcementId .'/edit')}}"
                                               class="btn btn-warning btn-rounded">Edit</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <button type="submit" class="positive" name="submit" id="submit" hidden="hidden">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

