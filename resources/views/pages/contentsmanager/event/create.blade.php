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
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4>Add Event</h4>
                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        <div class="alert alert-primary" role="alert">
                            <b>Fields with asterisk (*) are required.</b>
                        </div>
                        <form action="{{action('EventController@store')}}" id="item-form" name="item-form" method="post"
                              enctype="multipart/form-data" role="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group required">
                                            <label>Event Name</label>
                                            <input type="text" name="name" id="name" value="{{old('name')}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Event Category</label>
                                            <select class="form-control custom-select input-default"
                                                    name="category_id" id="category_id">
                                                <option readonly="true">Select Event Category</option>
                                                <option value="0" {{ old('category_id') == 1 ? 'selected' : '' }}>
                                                    Public
                                                </option>
                                                <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>
                                                    Seminar
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control custom-select input-default"
                                                    name="status" id="status">
                                                <option value="">Select Status</option>
                                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="0" {{ old('status') == 1 ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group required">
                                            <label>Event Description</label>
                                            <textarea class="form-control input-default" rows="5"
                                                      name="description"
                                                      id="eventDescription">{{old('description')}}</textarea>
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
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
                                        <div class="form-group required">
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
                                            <label>Start Date</label>
                                            <input type="datetime-local" name="start_date"
                                                   value="{{old('start_date')}}"
                                                   class="form-control input-default"
                                                   placeholder="yyyy/mm/dd">
                                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <input type="datetime-local" name="end_date" value="{{old('end_date')}}"
                                                   class="form-control input-default"
                                                   placeholder="yyyy/mm/dd">
                                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Venue</label>
                                            <input type="text" name="venue" id="venue"
                                                   value="{{old('venue')}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('venue') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>House/Apartment/Unit Number</label>
                                            <input type="text" name="unitno" id="unitno"
                                                   value="{{old('unitno')}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('unitno') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Building</label>
                                            <input type="text" name="bldg"
                                                   value="{{old('bldg')}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('bldg') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input type="text" name="street" value="{{old('street')}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('street') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city" id="city" value="{{old('city')}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="form-actions">
                                    <button class="btn btn-success" id="btnSubmit" type="submit"
                                            value="Submit">Submit
                                    </button>
                                    <button class="btn btn-inverse" type="reset"
                                            value="Cancel">Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card mt-5 col-12 shadow">
                <div class="card-body">
                    <div class="card-title">
                        <h4>List of Events</h4>
                    </div>
                    <table id="myTable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Expand</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Posted By</th>
                            <th>Date Created</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td></td>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->user->firstname . ' ' . $event->user->lastname}}</td>
                                <td>{{ \Carbon\Carbon::parse($event->created_at)->format('d/m/Y')}}</td>
                                <td><a onclick="confirm('Are you sure?')"
                                       href="{{URL::to('contentmanager/event/changeStatus/'. $event->id. '/'.  ($event->status == 1 ? '0' : '1')  .'')}}"
                                       class="btn {{$event->status == 1 ? 'btn btn-rounded btn-success' : 'btn btn-rounded btn-danger'}}">{{$event->status == 1 ? 'Active' : 'Inactive' }}</a>
                                </td>
                                <td>

                                        <a href="{{URL::to('/contentmanager/events/'. $event->id.'')}}"
                                           class="btn btn-rounded btn-primary ">View</a>
                                        <a href="{{URL::to('contentmanager/events/' . $event->id .'/edit')}}"
                                           class="btn btn-warning btn-rounded">Edit</a>
                                    {{--    <div class="col">
                                            <button type="button" class="btn btn-block btn-default" onclick="$( 'textarea' ).ckeditor();" data-toggle="modal"
                                                    data-target="#modal-form{{$event->id}}">Form
                                            </button>

                                        </div>--}}


                                </td>
                            </tr>
                           {{-- <div class="modal fade" id="modal-form{{$event->id}}"
                                 role="dialog"
                                 aria-labelledby="modal-form" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-sm"
                                     role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card bg-secondary shadow border-0">
                                                <div class="card-body">
                                                    <div class="text-center text-muted mb-4">
                                                        <small>Write the following information below</small>
                                                    </div>
                                                    --}}{{--<form role="form"  name="form{{$event->id}}">--}}{{--

                                                    <div class="form-group">
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                                class="ni ni-lock-circle-open"></i></span>
                                                            </div>
                                                            <textarea class="ckeditor"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="button"
                                                                class="btn btn-primary my-4">Send
                                                        </button>
                                                    </div>
                                                    --}}{{--</form>--}}{{--
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
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

