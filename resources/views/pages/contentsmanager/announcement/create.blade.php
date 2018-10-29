@extends('layouts.master.admin')

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
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Announcements
@endsection
@section('header')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card shadow card-outline-primary">
                <div class="card-header">
                    <h4>Add Announcement</h4>
                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        <div class="alert alert-primary" role="alert">
                            <b>Fields with asterisk (*) are required.</b>
                        </div>
                        <form action="{{action('AnnouncementsController@store')}}" method="POST"
                              enctype="multipart/form-data" id="announcementForm" role="form">
                            @method('Post')
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group required">
                                            <label>Title</label>
                                            <input type="text" name="title" id="title"
                                                   class=" form-control input-default" value="{{old('title')}}">
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group required">
                                            <label>Announcement Type</label>
                                            <select class="form-control custom-select input-default"
                                                    name="type_id" id="type_id">
                                                <option value="">Select Type</option>
                                                <option value="1" {{ old('type_id') == 1 ? 'selected' : '' }}>
                                                    General
                                                </option>
                                                <option value="0" {{ old('type_id') == 1 ? 'selected' : '' }}>
                                                    Special
                                                </option>
                                            </select>
                                            <span class="text-danger">{{ $errors->first('type_id') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control custom-select input-default"
                                                    name="status_id" id="status_id">
                                                <option value="">Select Status</option>
                                                <option value="1" {{ old('status_id') == 1 ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="0" {{ old('status_id') == 1 ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input name="announcementImage[]" multiple type="file"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group required">
                                            <label>Description</label>
                                            <textarea class="form-control input-default" id="description"
                                                      rows="3"
                                                      name="description">{{ old('description') }}</textarea>
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Due Date</label>
                                            <input type="date" name="due_date" id="due_date"
                                                   class=" form-control input-default" placeholder="dd/mm/yyyy"
                                                   value="{{old('due_date')}}">
                                            <span class="text-danger">{{ $errors->first('due_date') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="form-actions">
                                    <input class="btn btn-success" type="submit"
                                           value="Submit">
                                    <input class="btn btn-inverse" type="reset"
                                           value="Reset ">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <form id="status" action="{{URL::to('/changeStatus')}}" method="post">
                @csrf
                <div class="card mt-5 col-12 shadow">
                    <div class="card-header border-0">
                        List of Announcements
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Expand</th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Posted By</th>
                                <th>Date Created</th>
                                <th>Type</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($announcements as $announcement)
                                <tr>
                                    <td></td>
                                    <td>{{ $announcement->id }}</td>
                                    <td>{{ $announcement->title }}</td>
                                    <td>{{ $announcement->user->firstname . ' ' . $announcement->user->lastname }}</td>
                                    <td>{{ \Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y')}}</td>
                                    {{--<td>{{ \Carbon\Carbon::parse($announcement->updated_at)->format('d/m/Y')}}</td>--}}
                                    <td>{{ $announcement->type_id == 1 ? 'General' : 'Special'}}</td>
                                    <td>{{ $announcement->due_date}}</td>
                                    <td><a onclick="confirm('Are you sure?')"
                                           href="{{URL::to('contentmanager/announcements/changeStatus/'. $announcement->id. '/'.  ($announcement->status_id == 1 ? '0' : '1')  .'')}}"
                                           class="{{$announcement->status_id == 1 ? 'btn btn-rounded btn-success' : 'btn btn-rounded btn-danger'}}">{{$announcement->status_id == 1 ? 'Active' : 'Inactive' }}</a>
                                    </td>
                                    <td>
                                        <nobr>
                                            <a href="{{URL::to('/contentmanager/announcements/'. $announcement->id.'')}}"
                                               class="btn btn-rounded btn-primary ">View</a>
                                            <a href="{{URL::to('/contentmanager/announcements/'. $announcement->id .'/edit')}}"
                                               class="btn btn-rounded btn-warning ">Edit</a>
                                        </nobr>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <button type="submit" class="positive" name="submit" id="submit" hidden="hidden">save
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

