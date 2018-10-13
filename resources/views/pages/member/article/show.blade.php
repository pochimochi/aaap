@extends('layouts.member.layout')

@section('content')
    <div class="cover">
        @include('layouts.member.header')
    </div>
<div class="lg-space"></div>
    <div class="container">


        <div class="card-title"><h1>{{$article->title}}</h1></div>
        <small class="text-muted"><b>Posted by: </b>{{ App\User::find($article->postedBy)->userFirstName}}
            on: {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y')}}</small>
        @if($article->modifiedBy != 0)
            <small class="text-muted"><b>Modified By: </b> {{ App\User::find($article->modifiedBy)->userFirstName}}
                on: {{ \Carbon\Carbon::parse($article->updated_at)->format('d/m/Y')}}</small>
            &nbsp;@endif
        @if(session('user')->userTypeId == 2)
            <hr>

            @if($article->statusId == 0)
                <div class="alert alert-danger" role="alert">
                    This is article is currently archived
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    This is article is currently active
                </div>
            @endif
        @endif
        <hr>
        <p class="card-text">{!! $article->body !!}</p>
        @if(session('user')->userTypeId == 2)
            <div class="container">
                <div class="row">

                    <a href="{{URL::to('/writer/articles/'.$article->articleId .'/edit ')}}"
                       class="btn btn-outline-info">Edit</a>&nbsp;

                    <form action="{{URL::action('ArticleController@destroy', ['articleId' => $article->articleId])}}"
                          method="post">
                        @method('DELETE')
                        @csrf

                        @if ($article->statusId != 0)
                            <button type="submit" class="btn btn-outline-danger">Archive</button>
                        @else
                            <button type="submit" class="btn btn-outline-success">Restore</button>
                        @endif
                    </form>

                </div>
            </div>
        @endif


    </div>




@endsection