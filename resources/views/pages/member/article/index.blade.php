@extends('layouts.member.layout')
@section('content')
    <div class="cover">
        @include('layouts.member.header')
    </div>
<div class="lg-space"></div>

    <section class="section bg-light">
        <div class="container" align="right">
            <form action="{{action('ArticleController@searching')}}" method="post">
                @csrf
                <div class="col-4">
                    <div class="input-group">
                        <input type="text" name="search" placeholder="Search" class="form-control">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="container">

            <div class="row">

                <div class="container">
                    <div class="card-deck">


                        @foreach ($articles as $article)
                            <div class="col">
                                <div class="box box-shadow">
                                    {{--  <div class="card-header">--}}
                                    <h3 class="card-title">
                                        <a class="text-muted" href="{{URL::to('member/articles/'. $article->id .'')}}">


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

                                    {{--  <small>Posted by: {{ App\User::find($article->posted_by)->firstname}} on
                                          - {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y')}}</small>--}}

                                    {{--@if($article->modifiedBy != 0)
                                        <small>Modified By: {{ App\User::find($article->modifiedBy)->userFirstName  }}
                                            on - {{ \Carbon\Carbon::parse($article->updated_at)->format('d/m/Y')}}</small>
                                    @endif--}}


                                    {{--<div class="card-body">--}}
                                    <p class="card-text">{!! $article->body !!}</p>

                                </div>
                            </div>


                        @endforeach



                    </div>
                    <br>
                    <div class="row">

                        <div class="col-8">
                            <p>
                                There are {{\App\Articles::count()}} articles
                            </p>

                        </div>
                        <div class="col-4 align-self-end">
                            {{ $articles->links() }}
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>


@endsection
