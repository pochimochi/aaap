<!DOCTYPE html>
<html lang="en">

@include('layouts.master.header')
<body class="fix-header fix-sidebar">
@include('layouts.admin.adminhomenav')
@include('layouts.admin.adminsidebar')
<div class="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-primary">
                <h3>Event Details</h3>
                <div class="card-body">
                    <div class="basic-elements">
                        <form action="{{URL::to('/eventsubmit')}}" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h6>Event Name</h6>
                                            <input type="text" name="eventName" id="eventName"
                                                   class="form-control input-default">
                                        </div>
                                        <div class="form-group">
                                            <h6>Event Description</h6>
                                            <textarea class="form-control input-default" rows="5"
                                                      name="eventDescription"
                                                      id="eventDescription"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <h6>Event Category</h6>
                                            <select class="form-control custom-select input-default">
                                                <option>Select Event Category</option>
                                                <option value="">Public</option>
                                                <option value="">Seminar</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h6>Event Type</h6>
                                                    <select class="form-control custom-select input-default"
                                                            name="isPaid" id="isPaid">
                                                        <option readonly="true">Select Event Type</option>
                                                        <option value="1">Free</option>
                                                        <option value="0">Paid</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h6>Event Rate</h6>
                                                    <input type="text" name="rate" id="rate"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
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
                                                   placeholder="yyyy/mm/dd">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>End Date</h6>
                                            <input type="datetime-local" name="endDate"
                                                   class="form-control input-default"
                                                   placeholder="yyyy/mm/dd">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h6>Venue</h6>
                                    <input type="text" name="venue" id="venue"
                                           value=""
                                           class="form-control input-default">
                                </div>
                                <h6>Address</h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Unit Number</h6>
                                            <input type="text" name="unitno" id="unitno"
                                                   value=""
                                                   class="form-control input-default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <h6>Building</h6>
                                            <input type="text" name="building"
                                                   value=""
                                                   class="form-control input-default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <h6>Street</h6>
                                            <input type="text" name="street" value=""
                                                   class="form-control input-default">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" id="city"
                                               class="form-control input-default">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select name="country" id="country"
                                                class="form-control custom-select input-default">
                                            <option value="">Select Country</option>
                                            <?php
                                            $sql = mysqli_query(mysqli_connect("localhost", "root", "", "aaapdb"), "SELECT * From countries");
                                            $row = mysqli_num_rows($sql);
                                            while ($row = mysqli_fetch_array($sql)) {
                                                echo "<option value='" . $row['countryId'] . "'>" . $row['name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h6>Posted By</h6>
                                            <input type="text" name="postedBy" id="postedBy"
                                                   value=""
                                                   class=" form-control input-default">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h6>Modified By</h6>
                                            <input type="text" name="modifiedBy" id="modifiedBy"
                                                   value=""
                                                   class=" form-control input-default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Upload Event Image</h6>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <input type="submit" value="Upload Image" name="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> Add
                                </button>
                                <button type="button" class="btn btn-inverse">Cancel</button>
                            </div>
                        </form>
                    </div>
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
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Event Name</th>
                                <th>Category</th>
                                <th>Posted By</th>
                                <th>Modified By</th>
                                <th>Venue</th>
                                <th>Type</th>
                                <th></th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Posted By</th>
                                <th>Modified By</th>
                                <th>Date Posted</th>
                                <th>Date Modified</th>
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
                                    <td>{{ $event->status }}</td>
                                    <td>{{ $event->startDate }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
@include('layouts.master.footer')
</body>
</html>
