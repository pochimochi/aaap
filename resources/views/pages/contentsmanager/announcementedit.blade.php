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
                                      action="{{action('AnnouncementsController@update', $announcementId)}}"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <h6>Announcement ID</h6>
                                                    <input type="text" name="announcementId" id="announcementId"
                                                           class="form-control input-default"
                                                           value="{{$announcement->announcementId}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <h6>Title</h6>
                                                    <input type="text" name="title" id="title"
                                                           class=" form-control input-default"
                                                           value="{{$announcement->title}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <h6>Announcement Type</h6>
                                                    <select class="form-control custom-select input-default"
                                                            name="aTypeId" id="aTypeId">
                                                        <option value="1"
                                                                @if($announcement->aTypeId=="1") selected @endif>
                                                            General
                                                        </option>
                                                        <option value="0"
                                                                @if($announcement->aTypeId=="0") selected @endif>
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

                                                    <img src="{{asset('/storage/'.$announcement->imageLocation)}}" class="img-fluid">
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
                                        <div class=" row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h6>Posted By</h6>
                                                    <input type="text" name="postedBy" id="postedBy"
                                                           class=" form-control input-default"
                                                           value="{{$announcement->postedBy}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h6>Modified By</h6>
                                                    <input type="text" name="modifiedBy" id="modifiedBy"
                                                           class=" form-control input-default"
                                                           value="{{$announcement->modifiedBy}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6>Due Date</h6>
                                                    <input type="date" name="dueDate" id="dueDate"
                                                           class="form-control input-default"
                                                           value="{{ \Carbon\Carbon::parse($announcement->dueDate)->format('Y-m-d')}}">
                                                    {{--<h2>{{ Carbon\Carbon::parse($announcement->dueDate)->format('d/m/Y') }} </h2>--}}
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