@extends('layouts.master.admin')
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
        <div class="container-fluid mt--200 pb--5">
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
                                    <div class="col-lg-6">
                                        <div class="form-group required">
                                            <label>Title</label>
                                            <input type="text" name="title" id="title"
                                                   class=" form-control input-default" value="{{old('title')}}">
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group required">
                                            <label>Announcement Type</label>
                                            <select class="form-control custom-select input-default"
                                                    name="type_id" id="type_id">
                                                <option value="">Select Type</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{ old('type_id') == $category->id ? 'selected' : '' }}>
                                                        {{$category->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('type_id') }}</span>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="btn btn-success btn-block" for="announcementImage">Upload
                                            Images</label>
                                        <div class="form-group">
                                            <input hidden multiple name="announcementImage[]" onchange="readURL(this)"
                                                   id="announcementImage"
                                                   type="file" class="form-control-file"/>
                                            <div class="card bg-gradient-teal border-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <div class="card shadow border-0">
                                                                <img id="blah" class="card-img"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="text-danger">{{ $errors->first('announcementImage.*') }}</span>
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
                                <td>
                                    @if($announcement->status == 1)
                                        <label class="badge badge-success">Active</label>
                                    @else
                                        <label class="badge badge-danger">Archived</label>
                                    @endif

                                </td>
                                <td>
                                    <nobr>
                                        <a href="{{URL::to('/contentmanager/announcements/'. $announcement->id.'')}}"
                                           class="btn btn-rounded btn-success ">View</a>
                                        <a href="{{URL::to('/contentmanager/announcements/'. $announcement->id .'/edit')}}"
                                           class="btn btn-rounded btn-info ">Edit</a>
                                        @if($announcement->status == 1)
                                            <a data-toggle="modal"
                                               data-target="#status-form{{$announcement->id}}"
                                               class="btn text-white btn btn-rounded btn-warning">Archive
                                                Announcement</a>


                                        @endif
                                    </nobr>
                                </td>
                            </tr>
                            @if($announcement->status == 1)
                                <div class="modal fade" id="status-form{{$announcement->id}}"
                                     role="dialog"
                                     aria-labelledby="status-form" aria-hidden="true">
                                    <div class="modal-dialog modal modal-lg modal-dialog-centered modal-sm"
                                         role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card bg-secondary shadow border-0">
                                                    <div class="card-body">
                                                        <form action="{{url('contentmanager/announcement/change_status')}}"
                                                              id="form{{$announcement->id}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                   value="{{$announcement->id}}">
                                                            <div class="col-12 mt-5">
                                                                <label for="remarks">Please state the reason for
                                                                    archiving this announcement below.</label>
                                                                <textarea name="remarks" rows="5" id="remarks"
                                                                          class="form-control form-control-alternative"></textarea>
                                                                <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                                            </div>
                                                            <div class="text-center mt-5">
                                                                <button type="submit" id="btnSubmit"
                                                                        class="btn btn-rounded btn-danger">Archive
                                                                    Announcement
                                                                </button>
                                                            </div>
                                                        </form>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $('#form{{$announcement->id}}').submit(function (e) {
                                        e.preventDefault();
                                        var form = $('#form{{$announcement->id}}');
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
                                                form.submit()
                                            }
                                        })
                                    });
                                </script>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection



