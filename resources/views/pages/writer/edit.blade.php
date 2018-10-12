@extends('layouts.master.master')
@section('content')


    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">

                    <br>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <div class="basic-elements">
                            <form method="post" action="{{URL::to('/writer/articles', $article->id)}}">
                                @csrf
                                @method('Put')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Article ID</label>
                                                <input type="text" name="id" id="id"
                                                       class="form-control input-default"
                                                       value="{{$article->id}}" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Title</label>
                                                <input type="text" name="title" id="title"
                                                       class=" form-control input-default"
                                                       value="{{$article->title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Article Type</label>
                                                <select class="form-control custom-select input-default"
                                                        name="articletype_id" value="{{$article->articletype_id}}">
                                                    <option value="1" @if($article->articletype_id=="1") selected @endif>
                                                        Case Studies
                                                    </option>
                                                    <option value="2" @if($article->articletype_id=="2") selected @endif>
                                                        Commentaries
                                                    </option>
                                                    <option value="3" @if($article->articletype_id=="3") selected @endif>
                                                        Methodologies
                                                    </option>
                                                    <option value="4" @if($article->articletype_id=="4") selected @endif>
                                                        Reports
                                                    </option>
                                                    <option value="5" @if($article->articletype_id=="5") selected @endif>
                                                        Research
                                                    </option>
                                                    <option value="6" @if($article->articletype_id=="6") selected @endif>
                                                        Review
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{--<label class="control-label">Body</label>--}}
                                            <h6>Body</h6>
                                            <!--Insert Rich Text Editor Here-->
                                            <textarea class="ckeditor" name="body">{{$article->body}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Modified By</label>
                                            <input type="text" name="modifiedBy" id="modifiedBy"
                                                   class=" form-control input-default"
                                                   value="{{$article->modifiedBy}}">
                                        </div>
                                    </div>--}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <select class="form-control custom-select  input-default"
                                                    name="status_id">
                                                <option>Select Status</option>
                                                <option value="1"
                                                        @if($article->status_id=="1") selected @endif>
                                                    Active
                                                </option>
                                                <option value="0"
                                                        @if($article->status_id=="0") selected @endif>
                                                    Inactive
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input class="btn btn-success" type="submit" id="btnSubmit"
                                           value="Update">
                                    <a href="{{URL::to('/writer/articles/create')}}" class="btn btn-danger">Back</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection



