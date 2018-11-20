@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Events
@endsection
@section('header')
    <div class="header bg-gradient-info pb-8 pt-5 pt-md-8">
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
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label type="hidden">Event ID</label>
                                                <input type="text" name="id" id="id"
                                                       class="form-control input-default"
                                                       value="{{$event->id}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Event Name</label>
                                                <input type="text" name="name" id="name"
                                                       value="{{$event->name}}"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Event Category</label>
                                                <select class="form-control custom-select input-default"
                                                        name="category_id">
                                                    <option readonly="true">Select Event Category</option>
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{$category->id}}" {{
                                                            old('category_id') == $category->id ? 'selected' : '' }}
                                                            {{$event->category_id == $category->id ? 'selected' : '' }}>
                                                            {{$category->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Event Description</label>
                                                <textarea class="form-control input-default" rows="5"
                                                          name="description"
                                                          id="description">{{$event->description}}</textarea>
                                            </div>
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="btn btn-success btn-block" for="eventImage">Upload
                                                    Images
                                                </label>
                                                <input type='file' hidden multiple name="eventImage[]"
                                                       id="eventImage"/>
                                                <div class="card bg-gradient-teal border-0">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            @foreach($event->image as $image)
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
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Event Type</label>
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
                                                <label>Event Rate</label>
                                                <input type="text" name="rate" id="rate"
                                                       value="{{$event->rate}}"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Event Duration</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label>Starting Date</label>
                                                <input type="datetime-local" name="start_date"
                                                       class="form-control input-default"
                                                       value="{{\Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i')}}"
                                                       placeholder="YYYY-dd-mm">
                                                <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group required">
                                                <label>End Date</label>
                                                <input type="datetime-local" name="end_date"
                                                       class="form-control input-default"
                                                       value="{{\Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i')}}"
                                                       placeholder="YYYY-dd-mm">
                                                <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group required">
                                            <label>Venue</label>
                                            <input type="text" name="venue" id="venue"
                                                   value="{{$event->venue}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('venue') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <h3>Address</h3>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            <label>Unit Number</label>
                                            <input type="text" name="unitno" id="unitno"
                                                   value="{{$event->address->unitno}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('unitno') }}</span>

                                        </div>
                                    </div>
                                    <div class="col-6 ">
                                        <div class="form-group">
                                            <label>Building</label>
                                            <input type="text" name="bldg" id="bldg"
                                                   value="{{$event->address->bldg}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('bldg') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            <label>Street</label>
                                            <input type="text" name="street"
                                                   value="{{$event->address->street}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('street') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group required">
                                            <label>City</label>
                                            <input type="text" name="city" id="city"
                                                   value="{{$event->address->city->name}}"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 required">
                                        <label>State/Province</label>
                                        <div class="form-group required">
                                            <input value="{{ old('province') }}" type="text" name="province" id="province"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('province') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="form-actions">
                                        <input class="btn btn-success btn-rounded" type="submit"
                                               value="Update">
                                        <a href="{{URL::to('/contentmanager/events/create')}}"
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
@endsection
