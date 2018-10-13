@extends('layouts.master.master')
@section('content')
    <div class="content">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4>Edit Event</h4>
            </div>
            </br>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="card-body">
                <form action="{{action('EventController@update', $event->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <h6 type="hidden">Event ID</h6>
                                    <input type="text" name="id" id="id"
                                           class="form-control input-default"
                                           value="{{$event->id}}" disabled>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <h6>Event Name</h6>
                                    <input type="text" name="name" id="name"
                                           value="{{$event->name}}"
                                           class="form-control input-default">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <h6>Event Category</h6>
                                    <select class="form-control custom-select input-default" name="category_id">
                                        <option readonly="true">Select Event Category</option>
                                        <option value="0"
                                                @if($event->category_id=="0") selected @endif>
                                            Public
                                        </option>
                                        <option value="1"
                                                @if($event->category_id=="1") selected @endif>
                                            Seminar
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <h6>Status</h6>
                                    <select class="form-control custom-select input-default"
                                            name="status" id="status">
                                        <option readonly="true">Select Status</option>
                                        <option value="1"
                                                @if($event->status=="1" || old('status') == 1) selected @endif>
                                            Active
                                        </option>
                                        <option value="0"
                                                @if($event->status=="0" || old('status') == 0) selected @endif>
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h6>Event Description</h6>
                                    <textarea class="form-control input-default" rows="5"
                                              name="description"
                                              id="description">{{$event->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class=" row">
                                    <div class="form-group">
                                        <div class="col-6">
                                            <label class="btn btn-outline-success" for="eventImage">Upload Image
                                                Here</label>
                                            <input type='file' hidden="true" name="eventImage" id="eventImage"
                                                   onchange="readURL(this);"/>
                                        </div>
                                        <div class="col-6">
                                            <div class="card shadow">
                                                <img id="blah" src="{{asset('/storage/'.$event->image->location.'')}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h6>Event Type</h6>
                                    <select class="form-control custom-select input-default"
                                            name="paid" id="paid">
                                        <option readonly="true">Select Event Type</option>
                                        <option value="1"
                                                @if($event->paid=="1") selected @endif>
                                            Free
                                        </option>
                                        <option value="0"
                                                @if($event->paid=="0") selected @endif>
                                            Paid
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h6>Event Rate</h6>
                                    <input type="text" name="rate" id="rate"
                                           value="{{$event->rate}}"
                                           class="form-control input-default">
                                </div>
                            </div>
                        </div>
                        <h6>Event Duration</h6>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <h6>Starting Date</h6>
                                    <input type="datetime-local" name="start_date"
                                           class="form-control input-default"
                                           value="{{\Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i')}}"
                                           placeholder="YYYY-dd-mm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h6>End Date</h6>
                                    <input type="datetime-local" name="end_date"
                                           class="form-control input-default"
                                           value="{{\Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i')}}"
                                           placeholder="YYYY-dd-mm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h6>Venue</h6>
                                <input type="text" name="venue" id="venue"
                                       value="{{$event->venue}}"
                                       class="form-control input-default">
                            </div>
                        </div>
                    </div>
                    <h6>Address</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <h6>Unit Number</h6>
                                <input type="text" name="unitno" id="unitno"
                                       value="{{$event->address->unitno}}"
                                       class="form-control input-default">

                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="form-group">
                                <h6>Building</h6>
                                <input type="text" name="bldg" id="bldg"
                                       value="{{$event->address->bldg}}"
                                       class="form-control input-default">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <h6>Street</h6>
                                <input type="text" name="street"
                                       value="{{$event->address->street}}"
                                       class="form-control input-default">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" id="city"
                                       value="{{$event->address->city->name}}"
                                       class="form-control input-default">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input class="btn btn-success btn-rounded" type="submit"
                               value="Update">
                        <a href="{{URL::to('/contentmanager/event')}}" class="btn btn-dark btn-rounded">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
