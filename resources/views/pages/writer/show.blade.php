@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title"><h1>{{$article->title}}</h1></div>
                    <small class="text-muted"><b>Posted by: </b>{{ $article->user->firstname}}
                        on: {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y')}}</small>
                    @if($article->modifiedBy != 0)
                        <small class="text-muted"><b>Modified By: </b> {{ $article->user->firstname}}
                            on: {{ \Carbon\Carbon::parse($article->updated_at)->format('d/m/Y')}}</small>
                        &nbsp;@endif
                    @if(session('user')->role_id == 2)
                        <hr class="my-3">
                        @if($article->status_id == 0)
                            <div class="alert alert-danger" role="alert">
                                <b>This is article is currently archived</b>
                            </div>
                        @else
                            <div class="alert alert-success" role="alert">
                                <b>This is article is currently active</b>
                            </div>
                        @endif
                    @endif
                    <p class="card-text">{!! $article->body !!}</p>
                    @if(session('user')->role_id == 2)
                        <div class="row justify-content-end">
                            <a href="{{URL::to('/writer/articles/'.$article->id .'/edit ')}}"
                               class="btn btn-info">Edit</a>&nbsp;
                            <a class="btn btn-danger"
                               href="{{URL::to('/writer/articles/create')}}">Back</a>
                            <form action="{{URL::action('ArticleController@destroy', ['articleId' => $article->id])}}"
                                  method="post">
                                @method('DELETE')
                                @csrf
                                @if ($article->status_id != 0)
                                    <button type="submit" class="btn btn-danger">Archive</button>
                                @else
                                    <button type="submit" class="btn btn-success">Restore</button>
                                @endif
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection