@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Articles
@endsection
@section('header')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->

            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="row">
        <div class="card col-12 shadow">
            <div class="card-header">Create Article</div>
            <div class="card-body">
                <div class="alert alert-primary" role="alert">
                    <b>Fields with asterisk (*) are required.</b>
                </div>
                <form action="{{url('/writer/articles')}}" method="post" enctype="multipart/form-data">
                    @method('Post')
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group required">
                                    <label class="control-label">Title</label>
                                    <input type="text" name="title"
                                           class="form-control input-default">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group required">
                                    <label class="control-label">Article Type</label>
                                    <select class="form-control custom-select input-default"
                                            name="articletype_id">
                                        <option value="">Select Article Type</option>
                                        <option value="1" {{ old('articletype_id') == 1 ? 'selected' : '' }}>
                                            Case Studies
                                        </option>
                                        <option value="2" {{ old('articletype_id') == 2 ? 'selected' : '' }}>
                                            Commentaries
                                        </option>
                                        <option value="3" {{ old('articletype_id') == 3 ? 'selected' : '' }}>
                                            Methodologies
                                        </option>
                                        <option value="4" {{ old('articletype_id') == 4 ? 'selected' : '' }}>
                                            Reports
                                        </option>
                                        <option value="5" {{ old('articletype_id') == 5 ? 'selected' : '' }}>
                                            Research
                                        </option>
                                        <option value="6" {{ old('articletype_id') == 6 ? 'selected' : '' }}>
                                            Review
                                        </option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('articletype_id') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <select class="form-control custom-select input-default"
                                            name="status_id" id="status_id">
                                        <option value="">Select Status</option>
                                        <option value="1" {{ old('status_id') == 1 ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="0" {{ old('status_id') == 1 ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <!--Insert Rich Text Editor Here-->
                                <textarea class="ckeditor" name="body"></textarea>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="btn btn-success btn-block" for="articleImage">Upload Image</label>
                                    <input name="articleImage[]" hidden id="articleImage" multiple type="file"/>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 justify-content-start">
                            <div class="form-actions">
                                <input class="btn btn-success" type="submit" id="btnsubmit" onclick=""
                                       value="Submit">
                                <input class="btn btn-inverse" type="reset"
                                       value="Reset">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
        <div class="card mt-5 col-12 shadow">
            <div class="card-header border-0">
                List of Articles
            </div>
            <div class="card-body">
                <table id="myTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date Published</th>
                        <th>Published By</th>
                        <th>Article Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr align="center">
                            <form action="{{action('ArticleController@changeStatus')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$article->id}}">
                                <input type="hidden" name="status_id" value="{{$article->status_id }}">
                                <td>{{ $article->id}}</td>
                                <td>{{ $article->title}}</td>
                                <td>{{ $article->created_at}}</td>
                                <td>{{ $article->user->firstname . ' ' .$article->user->lastname }}</td>
                                <td>{{ $article->modified_by}}</td>
                                <td>{{ $article->articletype_id /*== 6 ?'Case Studies' : 'Commentaries' : 'Methodologies' : 'Reports' : 'Research' : 'Review'*/ }}</td>
                                <td align="center">
                                    <button type="submit" id="changestatus" onclick="confirm('are you sure?')"
                                            class="btn-sm {{$article->status_id == 1 ? 'btn btn-success' : 'btn btn-rounded btn-danger'}}">{{$article->status_id == 1 ? 'Active' : 'Inactive' }}</button>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{URL::to('/writer/articles/'.$article->id)}}"
                                               class="btn btn-primary btn-sm " role="button">View</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{URL::to('/writer/articles/'.$article->id.'/edit')}}"
                                               class="btn btn-warning btn-sm " role="button">Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
