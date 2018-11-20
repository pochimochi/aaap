@extends('layouts.master.admin')

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
                                    <div class="col-6">
                                        <div class="form-group required">
                                            <label>Event Name</label>
                                            <input type="text" name="name" id="name" value="{{old('name')}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Event Category</label>
                                            <select class="form-control custom-select input-default"
                                                    name="category_id" id="category_id">
                                                <option readonly="true">Select Event Category</option>
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{$category->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--<div class="col-4">--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label>Status</label>--}}
                                    {{--<select class="form-control custom-select input-default"--}}
                                    {{--name="status" id="status">--}}
                                    {{--<option value="">Select Status</option>--}}
                                    {{--<option value="1" {{ old('status') == 1 ? 'selected' : '' }}>--}}
                                    {{--Active--}}
                                    {{--</option>--}}
                                    {{--<option value="0" {{ old('status') == 1 ? 'selected' : '' }}>--}}
                                    {{--Inactive--}}
                                    {{--</option>--}}
                                    {{--</select>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-12">
                                        <div class="form-group required">
                                            <label>Event Description</label>
                                            <textarea class="form-control input-default" rows="5"
                                                      name="description"
                                                      id="eventDescription">{{old('description')}}</textarea>
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="btn btn-success btn-block" for="eventImage">Upload
                                            Images</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input hidden name="eventImage[]" id="eventImage" onchange="readURL(this)" multiple
                                                           type="file" class="form-control-file"/>
                                                    <div class="card bg-gradient-teal border-0">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <div class="card shadow border-0">
                                                                        <img id="blah" class="card-img"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger">{{ $errors->first('eventImage.*') }}</span>
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
                                            <label id="ratelabel" >Event Rate</label>
                                            <input type="text"  name="rate" id="rate" value="{{old('rate')}}"
                                                   class="form-control input-default">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group required">
                                            <label>Start Date</label>
                                            <input type="datetime-local" name="start_date"
                                                   value="{{old('start_date')}}"
                                                   class="form-control ">
                                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group required">
                                            <label>End Date</label>
                                            <input type="datetime-local" name="end_date" value="{{old('end_date')}}"
                                                   class="form-control input-default"
                                                   placeholder="yyyy/mm/dd">
                                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group required">
                                            <label>Venue</label>
                                            <input type="text" name="venue" id="venue"
                                                   value="{{old('venue')}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('venue') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group required">
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
                                    <div class="col-4">
                                        <div class="form-group required">
                                            <label>Street</label>
                                            <input type="text" name="street" value="{{old('street')}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('street') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group required">
                                            <label>City</label>
                                            <input type="text" name="city" id="city" value="{{old('city')}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group required">
                                        <label>State/Province</label>
                                            <input value="{{ old('province') }}" type="text" name="province" id="province"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('province') }}</span>
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
                    <table id="myTable" class="table bg-white table-bordered table-condensed shadow">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Posted By</th>
                            <th>Date Created</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td></td>
                                <td>{{$event->id}}</td>
                                <td>{{$event->name}}</td>
                                <td>{{$event->description}}</td>
                                <td>{{$event->user->firstname . ' ' . $event->user->lastname}}</td>
                                <td>{{\Carbon\Carbon::parse($event->created_at)->format('d/m/Y')}}</td>
                                <td>
                                    @if($event->status == 1)
                                        <label class="badge badge-success">Active Event</label>
                                    @else
                                        <label class="badge badge-danger">Inactive Event</label>
                                    @endif
                                </td>
                                <td>
                                    <nobr>
                                        <a href="{{URL::to('/contentmanager/events/'. $event->id.'')}}"
                                           class="btn btn-rounded btn-primary ">View</a>
                                        <a href="{{URL::to('contentmanager/events/' . $event->id .'/edit')}}"
                                           class="btn btn-info btn-rounded">Edit</a>
                                        @if($event->status == 1)
                                            <a class="btn text-white btn-default"
                                               onclick="$( 'textarea' ).ckeditor();" data-toggle="modal"
                                               data-target="#modal-form{{$event->id}}">Send Reminder
                                            </a>
                                            <a data-toggle="modal"
                                               data-target="#status-form{{$event->id}}"
                                               class="btn text-white btn btn-rounded btn-warning">Cancel Event</a>
                                        @endif
                                    </nobr>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-form{{$event->id}}"
                                 role="dialog"
                                 aria-labelledby="modal-form" aria-hidden="true">
                                <div class="modal-dialog modal modal-lg modal-dialog-centered modal-sm"
                                     role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card bg-secondary shadow border-0">
                                                <div class="card-body">
                                                    <div class="text-center text-muted mb-4">
                                                        <small>Write the following information below</small>
                                                    </div>
                                                    <form role="form" method="POST"
                                                          action="{{action('EventController@reminder')}}"
                                                          name="form{{$event->id}}">
                                                        @csrf
                                                        <div class="col-12">
                                                            <input type="text"
                                                                   class="form-control form-control-alternative"
                                                                   placeholder="Subject" name="subject"> <span
                                                                class="text-danger">{{ $errors->first('subject') }}</span>
                                                        </div>
                                                        <div class="col-12 mt-5">
                                                            <textarea name="body" class="ckeditor"
                                                                      style="width: 100%; height: 50%"></textarea> <span
                                                                class="text-danger">{{ $errors->first('body') }}</span>

                                                        </div>


                                                        <div class="text-center">
                                                            <button type="submit"
                                                                    class="btn btn-primary my-4">Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="status-form{{$event->id}}"
                                 role="dialog"
                                 aria-labelledby="status-form" aria-hidden="true">
                                <div class="modal-dialog modal modal-lg modal-dialog-centered modal-sm"
                                     role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card bg-secondary shadow border-0">
                                                <div class="card-body">
                                                    <form action="{{url('contentmanager/event/change_status')}}"
                                                          id="form{{$event->id}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$event->id}}">
                                                        <div class="col-12 mt-5">
                                                            <label for="remarks">Please state the reason for cancelling this event below.</label>
                                                            <textarea name="remarks" rows="5" id="remarks"
                                                                      class="form-control form-control-alternative"></textarea>
                                                            <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                                        </div>
                                                        <div class="text-center mt-5">
                                                            <button type="submit" id="btnSubmit"
                                                                    class="btn btn-rounded btn-danger">Cancel Event
                                                            </button>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $('#form{{$event->id}}').submit(function (e) {
                                    e.preventDefault();
                                    var form = $('#form{{$event->id}}');
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
                                            form.submit()
                                        }
                                    })
                                });
                            </script>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#rate').prop('disabled', true);
            $('#rate').hide();
            $('#ratelabel').hide();

            $('#paid').on('input', function (event) {
                var text = $(this).val();

                if (text === '0') { // If email is empty
                    $('#rate').prop('disabled', false);
                    $('#rate').show();
                    $('#ratelabel').show();

                } else {
                    $('#rate').prop('disabled', true);
                    $('#rate').hide();
                    $('#ratelabel').hide();
                }
            });
            $('#remarksddl').on('input', function (event) {
                var text = $(this).val();

                if (text === '0') { // If email is empty
                    $('#remarks').prop('disabled', true);
                    $('#remarks').hide();
                    $('#remarks').hide();
                } else {
                    $('#remarks').prop('disabled', false);
                    $('#remarks').show();
                    $('#remarks').show();
                }
            });
        });

    </script>

@endsection

