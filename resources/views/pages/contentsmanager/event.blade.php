@include('layouts.master.header')
@include('layouts.admin.cmmenu')
<body class="fix-header fix-sidebar">
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Manage Events</h3></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0    text-white">Add Event</h4>
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
                        <form action="{{URL::to('/eventsubmit')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Event Name</label>
                                            <input type="text" name="eventName" id="eventName"
                                                   class="form-control input-default">
                                        </div>
                                        <div class="form-group">
                                            <label>Event Description</label>
                                            <textarea class="form-control input-default" rows="5"
                                                      name="eventDescription"
                                                      id="eventDescription"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input name="eventImage" type="file"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Event Category</label>
                                            <select class="form-control custom-select input-default">
                                                <option readonly="true">Select Event Category</option>
                                                <option value="0">Public</option>
                                                <option value="1">Seminar</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Event Type</label>
                                                    <select class="form-control custom-select input-default"
                                                            name="isPaid" id="isPaid">
                                                        <option readonly="true">Select Event Type</option>
                                                        <option value="1">Free</option>
                                                        <option value="0">Paid</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Event Rate</label>
                                                    <input type="text" name="rate" id="rate"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>
                                        <h6>Event Duration</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Starting Date</label>
                                                    <input type="datetime-local" name="startDate"
                                                           class="form-control input-default"
                                                           placeholder="yyyy/mm/dd">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>End Date</label>
                                                    <input type="datetime-local" name="endDate"
                                                           class="form-control input-default"
                                                           placeholder="yyyy/mm/dd">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Venue</label>
                                            <input type="text" name="venue" id="venue"
                                                   value=""
                                                   class="form-control input-default">
                                        </div>
                                        <h6>Address</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Unit Number</label>
                                                    <input type="text" name="unitno" id="unitno"
                                                           value=""
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Building</label>
                                                    <input type="text" name="bldg"
                                                           value=""
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" name="street" value=""
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="cityId" id="cityId"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control custom-select input-default"
                                                            name="status" id="status">
                                                        <option readonly="true">Select Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Posted By</label>
                                            <input type="text" name="postedBy" id="postedBy"
                                                   value=""
                                                   class=" form-control input-default">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Modified By</label>
                                            <input type="text" name="modifiedBy" id="modifiedBy"
                                                   value=""
                                                   class=" form-control input-default">
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>List of Events</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Posted By</th>
                                    <th>Modified By</th>
                                    {{--<th>Date Posted</th>--}}
                                    {{--<th>Date Modified</th>--}}
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->eventId }}</td>
                                        <td>{{ $event->eventName }}</td>
                                        <td>{{ $event->eventDescription }}</td>
                                        <td>{{ $event->postedBy }}</td>
                                        <td>{{ $event->modifiedBy }}</td>
                                        <td>{{ $event->isPaid== 1 ? 'General' : 'Special'}}</td>
                                        <td>{{ $event->status== 1 ? 'Active' : 'Inactive'}}</td>
                                        <td>{{ $event->endDate }}</td>
                                        <td><a href="{{URL::to('/eventedit', $event->eventId)}}"
                                               class="btn btn-warning btn-rounded">Edit</a></td>
                                        {{--<td><a href="{{URL::to('/eventdelete', $event->eventId)}}"--}}
                                        {{--class="btn btn-warning btn-rounded">Delete</a></td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.master.footer')
