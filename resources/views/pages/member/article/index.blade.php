@extends('layouts.member.layout')
@section('content')
    @include('layouts.member.header')
    <div class="lg-space"></div>
    <div class="content">
        <div class="row">


            <div class="container">


                @foreach ($articles as $article)

                    <div class="box box-shadow">
                      {{--  <div class="card-header">--}}
                            <h3 class="card-title">
                                <a class="text-muted" href="{{URL::to('member/articles/'. $article->articleId .'')}}">
                                    {{ $article->title}}
                                </a>
                                <small>
                                    @if (session('role') != 4)
                                        @if($article->statusId == 0)
                                            <span class="badge badge-danger float-right mt-1">Archived</span>
                                        @else
                                            <span class="badge badge-success float-right mt-1">Active</span>
                                        @endif
                                    @endif
                                </small>

                            </h3>

                            <small>Posted by: {{ App\User::find($article->postedBy)->userFirstName}} on
                                - {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y')}}</small>

                            {{--@if($article->modifiedBy != 0)
                                <small>Modified By: {{ App\User::find($article->modifiedBy)->userFirstName  }}
                                    on - {{ \Carbon\Carbon::parse($article->updated_at)->format('d/m/Y')}}</small>
                            @endif--}}


                        {{--<div class="card-body">--}}
                            <p class="card-text">{!! $article->body !!}</p>

                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>

@endsection
