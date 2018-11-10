@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('header')
    <div class="header bg-gradient-info pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->

            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-primary">
                <br>
                <div class="card-body">
                    <form method="post" action="{{URL::to('/writer/articles', $article->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('Put')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Article ID</label>
                                        <input type="text" name="id" id="id"
                                               class="form-control input-default"
                                               value="{{$article->id}}" readonly="true">
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                        <span class="text-danger">{{ $errors->first('articletype_id') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Title</label>
                                    <input type="text" name="title" id="title"
                                           class=" form-control input-default"
                                           value="{{$article->title}}">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Body</label>
                                    <!--Insert Rich Text Editor Here-->
                                    <textarea class="ckeditor" name="body">{{$article->body}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="btn btn-success btn-block" for="articleImage">Upload
                                        Images</label>
                                    <input name="articleImage[]" hidden id="articleImage" multiple type="file"/>
                                </div>
                                <div class="card bg-gradient-teal border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($article->image as $image)
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


                        <div class="row justify-content-end">
                            <div class="form-actions mt-5">
                                <input class="btn btn-success" type="submit" id="btnSubmit"
                                       value="Update">
                                <a href="{{URL::to('/writer/articles/create')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



