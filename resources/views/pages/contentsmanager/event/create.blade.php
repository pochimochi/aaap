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
    Events
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4>Add Event</h4>
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
                            <form action="{{action('EventController@store')}}" id="item-form" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Event Name</label>
                                                <input type="text" name="name" id="name" value="{{old('name')}}"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Event Category</label>
                                                <select class="form-control custom-select input-default"
                                                        name="category_id" id="category_id">
                                                    <option readonly="true">Select Event Category</option>
                                                    <option value="0">Public</option>
                                                    <option value="1">Seminar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
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
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Event Description</label>
                                                <textarea class="form-control input-default" rows="5"
                                                          name="description"
                                                          id="eventDescription">{{old('description')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="btn btn-outline-success" for="eventImage">Upload
                                                            Image
                                                            Here</label>
                                                        <input type='file' hidden="true" name="eventImage"
                                                               id="eventImage"
                                                               onchange="readURL(this);"/>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="card shadow">
                                                            <img id="blah" src="#"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Event Type</label>
                                                <select class="form-control custom-select input-default"
                                                        name="paid" id="paid">
                                                    <option readonly="true">Select Event Type</option>
                                                    <option value="1">Free</option>
                                                    <option value="0">Paid</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label id="ratelabel">Event Rate</label>
                                                <input type="text" name="rate" id="rate" value="{{old('rate')}}"
                                                       class="form-control input-default">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Starting Date</label>
                                                <input type="datetime-local" name="start_date"
                                                       value="{{old('start_date')}}"
                                                       class="form-control input-default"
                                                       placeholder="yyyy/mm/dd">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input type="datetime-local" name="end_date" value="{{old('end_date')}}"
                                                       class="form-control input-default"
                                                       placeholder="yyyy/mm/dd">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Venue</label>
                                                <input type="text" name="venue" id="venue"
                                                       value="{{old('venue')}}"
                                                       class="form-control input-default">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Unit Number</label>
                                                <input type="text" name="unitno" id="unitno"
                                                       value="{{old('unitno')}}"
                                                       class="form-control input-default">
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Building</label>
                                                <input type="text" name="bldg"
                                                       value="{{old('bldg')}}"
                                                       class="form-control input-default">
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Street</label>
                                                <input type="text" name="street" value="{{old('street')}}"
                                                       class="form-control input-default">
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" id="city" value="{{old('city')}}"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <button class="btn btn-success btn-rounded" id="btnSubmit" type="submit"
                                            value="Submit">Submit
                                    </button>
                                    <button class="btn btn-inverse btn-rounded" type="reset"
                                            value="Cancel">Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
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
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $event->id }}</td>
                                            <td>{{ $event->name }}</td>
                                            <td>{{ $event->description }}</td>
                                            <td>{{ $event->user->firstname . ' ' . $event->user->lastname}}</td>
                                            <td>{{ $event->posted_by }}</td>
                                            <td>{{ $event->paid== 1 ? 'Free' : 'Paid'}}</td>
                                            <td>{{ $event->end_date }}</td>
                                            <td><a onclick="confirm('Are you sure?')"
                                                   href="{{URL::to('contentmanager/event/changeStatus/'. $event->id. '/'.  ($event->status == 1 ? '0' : '1')  .'')}}"
                                                   class="btn {{$event->status == 1 ? 'btn btn-rounded btn-success' : 'btn btn-rounded btn-danger'}}">{{$event->status == 1 ? 'Active' : 'Inactive' }}</a>
                                            </td>
                                            <td>
                                                <nobr>
                                                    <a href="{{URL::to('/contentmanager/events/'. $event->id.'')}}"
                                                       class="btn btn-rounded btn-primary ">View</a>
                                                    <a href="{{URL::to('contentmanager/events/' . $event->id .'/edit')}}"
                                                       class="btn btn-warning btn-rounded">Edit</a>
                                                </nobr>
                                            </td>
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

    <script>
        $('#paid').on('input', function (event) {
            var text = $(this).val();

            if (text === '1') { // If email is empty
                $('#rate').prop('disabled', true);
                $('#rate').hide();
                $('#ratelabel').hide();
            } else {
                $('#rate').prop('disabled', false);
                $('#rate').show();
                $('#ratelabel').show();
            }
        });
    </script>

@endsection

