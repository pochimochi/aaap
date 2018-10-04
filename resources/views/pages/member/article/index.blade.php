@extends('layouts.member.layout')
@section('content')
    @include('layouts.member.header')
    <div class="content">
        <div class="row">


            <div class="container">


                @foreach ($articles as $article)
                    <div class="card">
                        <div class="card-header">


                            <a href="{{URL::to('member/articles/'. $article->articleId .'')}}">


                                <h3>{{ $article->title}}</h3>
                                @if($article->statusId == 0)
                                    <span class="badge badge-danger">Archived</span>
                                @else
                                    <span class="badge badge-success">Active</span>
                                @endif
                            </a>
                        </div>
                        <div class="card-body">


                            <p class="card-text">{!! $article->body !!}</p>


                        </div>
                        <br>
                        <div class="card-footer">
                            <small>Posted by: <b>{{ App\User::find($article->postedBy)->userFirstName}}</b> on
                                - {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y')}}</small>
                            <br>
                            @if($article->modifiedBy != 0)
                                <small>Modified By: <b>{{ App\User::find($article->modifiedBy)->userFirstName  }}</b>
                                    on - {{ \Carbon\Carbon::parse($article->updated_at)->format('d/m/Y')}}</small>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
