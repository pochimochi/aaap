@extends('layouts.master.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4>Edit an Announcement</h4>
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
                                <form method="post"
                                      action="{{action('AnnouncementsController@update', $announcement->id)}}"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Announcement ID</h6>
                                                    <input type="text" name="id" id="id"
                                                           class="form-control input-default"
                                                           value="{{$announcement->id}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Title</h6>
                                                    <input type="text" name="title" id="title"
                                                           class=" form-control input-default"
                                                           value="{{$announcement->title}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Announcement Type</h6>
                                                    <select class="form-control custom-select input-default"
                                                            name="type_id" id="type_id">
                                                        <option value="1"
                                                                @if($announcement->type_id=="1") selected @endif>
                                                            General
                                                        </option>
                                                        <option value="0"
                                                                @if($announcement->type_id=="0") selected @endif>
                                                            Special
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input class="form-control-file" name="announcementImage"
                                                           type="file"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card shadow">
                                                    <img src="{{asset('/storage/'.$announcement->image->location.'')}}" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <h6>Description</h6>
                                                    <input type="text" class=" form-control input-default"
                                                           name="description" id="description"
                                                           value="{{$announcement->description}}">
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class=" row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h6>Posted By</h6>
                                                    <input type="text" name="posted_by" id="posted_by"
                                                           class=" form-control input-default"
                                                           value="{{$announcement->posted_by}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h6>Modified By</h6>
                                                    <input type="text" name="modified_by" id="modified_by"
                                                           class=" form-control input-default"
                                                           value="{{$announcement->modified_by}}">
                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Due Date</h6>
                                                    <input type="date" name="due_date" id="due_date"
                                                           class="form-control input-default"
                                                           value="{{ \Carbon\Carbon::parse($announcement->due_date)->format('Y-m-d')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input class="btn btn-success btn-rounded" type="submit" id="btnSubmit"
                                               value="Update">
                                        <a href="{{URL::to('/contentmanager/announcements/create')}}" class="btn btn-dark btn-rounded">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection