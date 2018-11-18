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
        </div>
    </div>
</div>
@endsection
@section('content')
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
                    <label class="badge badge-success">Active Article</label>
                    @else
                    <label class="badge badge-danger">Archived Article</label>
                    @endif
                </td>
                </td>
                <td>
                    <nobr>
                        <a href="{{URL::to('/writer/articles/'.$article->id)}}"
                           class="btn btn-success" role="button">View</a>
                        <a href="{{URL::to('/writer/articles/'.$article->id.'/edit')}}"
                           class="btn btn-info" role="button">Edit</a>
                        @if($article->status == 1)
                        <a data-toggle="modal"
                           data-target="#status-form{{$article->id}}"
                           class="btn text-white btn-rounded btn-warning">Archive Article</a>
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
                                    <form action="{{url('writer/articles/change_status')}}"
                                          id="form{{$article->id}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$article->id}}">
                                        <div class="col-12 mt-5">
                                            <label for="remarks">Please state the reason for archiving this article below.</label>
                                            <textarea name="remarks" rows="5" id="remarks"
                                                      class="form-control form-control-alternative"></textarea>
                                            <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                        </div>
                                        <div class="text-center mt-5">
                                            <button type="submit" id="btnSubmit"
                                                    class="btn btn-rounded btn-danger">Archive
                                                Article
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection