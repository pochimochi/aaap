@include ('layouts.master.master')
@include ('layouts.admin.cmmenu')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Edit Events</h3></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0    text-white">Edit Event</h4>
                    </div>
                    </br>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="basic-elements">
                        <form action="{{action('EventController@update', $eventId)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h6 type="hidden">Event ID</h6>
                                            <input type="text" name="eventId" id="eventId"
                                                   class="form-control input-default"
                                                   value="{{$event->eventId}}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <h6>Event Name</h6>
                                            <input type="text" name="eventName" id="eventName"
                                                   value="{{$event->eventName}}"
                                                   class="form-control input-default">
                                        </div>
                                        <div class="form-group">
                                            <h6>Event Description</h6>
                                            <textarea class="form-control input-default" rows="5"
                                                      name="eventDescription"
                                                      id="eventDescription">{{$event->eventDescription}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <h6>Event Category</h6>
                                            <select class="form-control custom-select input-default">
                                                <option readonly="true">Select Event Category</option>
                                                <option value="0"
                                                        @if($event->eventCategoryId=="0") selected @endif>
                                                    Public
                                                </option>
                                                <option value="1"
                                                        @if($event->eventCategoryId=="1") selected @endif>
                                                    Seminar
                                                </option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h6>Event Type</h6>
                                                    <select class="form-control custom-select input-default"
                                                            name="isPaid" id="isPaid">
                                                        <option readonly="true">Select Event Type</option>
                                                        <option value="1"
                                                                @if($event->isPaid=="1") selected @endif>
                                                            Free
                                                        </option>
                                                        <option value="0"
                                                                @if($event->isPaid=="0") selected @endif>
                                                            Paid
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h6>Starting Date</h6>
                                                    <input type="datetime-local" name="startDate"
                                                           class="form-control input-default"
                                                           value="{{$event->startDate}}"
                                                           placeholder="YYYY-dd-mm">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h6>End Date</h6>
                                                    <input type="datetime-local" name="endDate"
                                                           class="form-control input-default"
                                                           value="{{$event->endDate}}"
                                                           placeholder="YYYY-dd-mm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h6>Venue</h6>
                                            <input type="text" name="venue" id="venue"
                                                   value="{{$event->venue}}"
                                                   class="form-control input-default">
                                        </div>
                                        <h6>Address</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6>Unit Number</h6>
                                                    <input type="text" name="unitno" id="unitno"
                                                           value="{{$address->unitno}}"
                                                           class="form-control input-default">
                                                    <input type="hidden" name="addressId" id="addressId"
                                                           value="{{$address->addressId}}"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <h6>Building</h6>
                                                    <input type="text" name="bldg" id="bldg"
                                                           value="{{$address->bldg}}"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <h6>Street</h6>
                                                    <input type="text" name="street"
                                                           value="{{$address->street}}"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="cityname" id="cityname"
                                                           value="{{$city->name}}"
                                                           class="form-control input-default">

                                                    <input type="hidden" name="cityId" id="cityId"
                                                           value="{{$city->cityId}}"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h6>Status</h6>
                                                    <select class="form-control custom-select input-default"
                                                            name="status" id="status">
                                                        <option readonly="true">Select Status</option>
                                                        <option value="1" @if($event->status=="1") selected @endif>
                                                            Active
                                                        </option>
                                                        <option value="0" @if($event->status=="0") selected @endif>
                                                            Inactive
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <h6>Posted By</h6>
                                                <input type="text" name="postedBy" id="postedBy"
                                                       value="{{$event->postedBy}}" disabled
                                                       class=" form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <h6>Modified By</h6>
                                                <input type="text" name="modifiedBy" id="modifiedBy"
                                                       value="{{$event->modifiedBy}}"
                                                       class=" form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input name="eventImage" type="file"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input class="btn btn-success btn-rounded" type="submit"
                                       value="Update">
                                <a href="{{URL::to('/event')}}" class="btn btn-dark btn-rounded">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.master.footer')
