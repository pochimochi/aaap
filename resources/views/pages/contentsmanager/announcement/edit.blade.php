@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Articles
@endsection
@section('header')
    <div class="header bg-gradient-info pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->

            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4>Edit Announcement</h4>
                        </div>
                        </br>
                        <div class="card-body">
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
                                                    <label>Announcement ID</label>
                                                    <input type="text" name="id" id="id"
                                                           class="form-control input-default"
                                                           value="{{$announcement->id}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" id="title"
                                                           class=" form-control input-default"
                                                           value="{{$announcement->title}}">
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Announcement Type</label>
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
                                                    <span class="text-danger">{{ $errors->first('type_id') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">

                                            <div class="form-group">
                                                <div class="col">
                                                    <label class="btn btn-success btn-block" for="announcementImage">Upload
                                                        Images</label>
                                                    <input type="file" hidden multiple name="announcementImage[]" id="announcementImage"/>
                                                </div>


                                                <div class="card bg-gradient-teal border-0">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            @foreach($announcement->image as $image)
                                                                <div class="col-2">
                                                                    <div class="card shadow border-0">

                                                                        <img id="blah" class="card-img"
                                                                             src="{{asset('/storage/'.$image->location.'')}}"/>

                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input class="form-control input-default"
                                                           rows="3"
                                                           name="description" id="description"
                                                           value="{{$announcement->description}}">
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Due Date</label>
                                                    @if ($announcement->due_date != null)
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ni ni-calendar-grid-58"></i></span>
                                                            </div>
                                                            <input class="form-control datepicker datepicker-orient-right"
                                                                   name="due_date" id="due_date"
                                                                   placeholder="Select date"
                                                                   type="date"
                                                                   value="{{ \Carbon\Carbon::parse($announcement->due_date)->format('Y-m-d')}}">
                                                        </div>
                                                        <span class="text-danger">{{ $errors->first('due_date') }}</span>
                                                    @else
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="ni ni-calendar-grid-58"></i></span>
                                                            </div>
                                                            <input class="form-control datepicker datepicker-orient-right"
                                                                   name="due_date" id="due_date"
                                                                   placeholder="Select date"
                                                                   type="date"
                                                                   value="">
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="form-actions">
                                            <input class="btn btn-success btn-rounded" type="submit" id="btnSubmit"
                                                   value="Update">
                                            <a href="{{URL::to('/contentmanager/announcements/create')}}"
                                               class="btn btn-dark btn-rounded">Back</a>
                                        </div>
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