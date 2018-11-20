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
    <div class="content">
        <div class="container-fluid">
            @if(session('role') == 2)
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4>Add Article</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-elements">
                            <div class="alert alert-primary" role="alert">
                                <b>Fields with asterisk (*) are required.</b>
                            </div>
                            <form action="{{url('/writer/articles')}}" method="post" enctype="multipart/form-data">
                                @method('Post')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group required">
                                                <label class="control-label">Title</label>
                                                <input type="text" name="title"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <!--Insert Rich Text Editor Here-->
                                            <textarea class="ckeditor" name="body"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col">
                                            <label class="btn btn-success btn-block" for="articleImage">Upload
                                                Images</label>
                                            <div class="form-group">
                                                <input hidden name="articleImage[]" id="articleImage" onchange="readURL(this)" multiple
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
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
                </div>
            @endif
            <div class="card mt-5 col-12 shadow">
                <div class="card-header border-0">
                    List of Articles
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Date Published</th>
                            <th>Published By</th>
                            <th>Date Modified</th>
                            <th>Modified By</th>
                            <th>Article Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($articles as $article)
                            <tr>

                                <td></td>
                                <td>{{ $article->id}}</td>
                                <td>{{ $article->title}}</td>
                                <td>{{ $article->created_at}}</td>
                                <td>{{ $article->user->firstname . ' ' .$article->user->lastname }}</td>
                                <td>{{ $article->updated_at ? $article->updated_at : 'N/A'}}</td>
                                <td>{{ $article->modifieduser ? $article->modifieduser->firstname . ' ' . $article->modifieduser->lastname : 'N/A'}}</td>
                                <td>{{ $article->articletype->name}}</td>
                                <td>
                                    @if($article->status == 1)
                                        <label class="badge badge-success">Active</label>
                                    @elseif($article->status == 0)
                                        <label class="badge badge-danger">Not Approved</label>
                                    @else
                                        <label class="badge badge-danger">Archived</label>
                                    @endif
                                </td>
                                </td>
                                <td>
                                    <nobr>

                                        @if(session('role') == 2)
                                            <a href="{{URL::to('/writer/articles/'.$article->id.'/edit')}}"
                                               class="btn btn-info" role="button">Edit</a>
                                            <a href="{{url('writer/articles', $article->id)}}"
                                               class="btn btn-success" role="button">View</a>
                                        @endif
                                        @if(session('role') == 5)
                                            <a href="{{url('editor/articles', $article->id)}}"
                                               class="btn btn-success" role="button">View</a>
                                            @if($article->status == 1)
                                                <a data-toggle="modal"
                                                   data-target="#status-form{{$article->id}}"
                                                   class="btn text-white btn-rounded btn-warning">Archive Article</a>
                                            @elseif($article->status == 0)
                                                <a data-toggle="modal"
                                                   data-target="#status-form{{$article->id}}"
                                                   class="btn text-white btn-rounded btn-warning">Approve Article</a>
                                            @endif
                                        @endif
                                    </nobr>
                                </td>

                            </tr>
                            <div class="modal fade" id="status-form{{$article->id}}"
                                 role="dialog"
                                 aria-labelledby="status-form" aria-hidden="true">
                                <div class="modal-dialog modal modal-lg modal-dialog-centered modal-sm"
                                     role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card bg-secondary shadow border-0">
                                                <div class="card-body">
                                                    <form action="{{action('ArticleController@changeStatus')}}"
                                                          id="form{{$article->id}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$article->id}}">
                                                        <div class="col-12 mt-5">
                                                            <label for="remarks">Please state the reason for changing
                                                                the status below.</label>
                                                            <textarea name="remarks" rows="5" id="remarks"
                                                                      class="form-control form-control-alternative"></textarea>
                                                            <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                                        </div>
                                                        <div class="text-center mt-5">

                                                            @if($article->status == 0)
                                                                <button type="submit" id="btnSubmit"
                                                                        class="btn btn-rounded btn-success">
                                                                    Approve Article
                                                                </button>
                                                            @else
                                                                <button type="submit" id="btnSubmit"
                                                                        class="btn btn-rounded btn-danger">
                                                                    Archive Article
                                                                </button>
                                                            @endif

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $('#form{{$article->id}}').submit(function (e) {
                                    e.preventDefault();
                                    var form = $('#form{{$article->id}}');
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
@endsection
