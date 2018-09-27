<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@include('layouts.master.header')
<body class="fix-header fix-sidebar">
<div id="main-wrapper">
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!--toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted  "
                                            href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                </ul>
                <!-- User profile -->
                <ul class="navbar-nav my-lg-0">
                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user"
                                                                           class="profile-pic"/></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End header header -->
    <!-- Left Sidebar  -->
</div>
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
                        <form action="{{action('EventController@eventview', $eventId)}}" method="post">
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
                                                   class="form-control input-default"disabled>
                                        </div>
                                        <div class="form-group">
                                            <h6>Event Description</h6>
                                            <textarea class="form-control input-default" rows="5"
                                                      name="eventDescription"
                                                      id="eventDescription"
                                                      value="{{$event->eventDescription}}"disabled></textarea>
                                        </div>
                                        <div class="form-group">
                                            <h6>Event Category</h6>
                                            <select class="form-control custom-select input-default"disabled
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
                                                            name="isPaid" id="isPaid"disabled>
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
                                                           class="form-control input-default"disabled>
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
                                                           placeholder="YYYY-dd-mm"disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h6>End Date</h6>
                                                    <input type="datetime-local" name="endDate"
                                                           class="form-control input-default"
                                                           value="{{$event->endDate}}"
                                                           placeholder="YYYY-dd-mm"disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h6>Venue</h6>
                                            <input type="text" name="venue" id="venue"
                                                   value="{{$event->venue}}"
                                                   class="form-control input-default"disabled>
                                        </div>
                                        <h6>Address</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6>Unit Number</h6>
                                                    <input type="text" name="unitno" id="unitno"
                                                           value="{{$event->unitno}}"
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
                                                           value="{{$event->bldg}}"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <h6>Street</h6>
                                                    <input type="text" name="street"
                                                           value="{{$event->street}}"
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
                                                           class="form-control input-default"disabled>

                                                    <input type="hidden" name="cityId" id="cityId"
                                                           value="{{$city->cityId}}"
                                                           class="form-control input-default"disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h6>Status</h6>
                                                    <select class="form-control custom-select input-default"
                                                            name="status" id="status"disabled>
                                                        <option readonly="true">Select Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
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
                                                       class=" form-control input-default" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="row">--}}
                                {{--<div class="col-md-6">--}}
                                {{--<div class="form-group">--}}
                                {{--<h6>Upload Event Image</h6>--}}
                                {{--<input type="file" name="fileToUpload" id="fileToUpload">--}}
                                {{--<input type="submit" value="Upload Image" name="submit">--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            <div class="form-actions">
                                {{--<input class="btn btn-success btn-rounded" type="submit"--}}
                                       {{--value="Update">--}}
                                <a href="{{URL::to('/userevent')}}" class="btn btn-dark btn-rounded">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.master.footer')
