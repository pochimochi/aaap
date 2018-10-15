@extends('layouts.member.layout')
@section('content')
    <div class="cover">
        @include('layouts.member.header')
    </div>
    <div class="sm-space"></div>

    <section class="section bg-light">
        <div class="container">
            <form action="{{action('ArticleController@searching')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="btn-group">
                            <a href="{{action('ArticleController@archived')}}" class="btn btn-danger">Archived
                                Posts</a>
                            {{-- </div>
                             <div class="col">--}}
                            <a href="{{url('member/articles')}}" class="btn  btn-success">Active
                                Posts</a>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="input-group">
                            <input type="text" name="search" placeholder="Search" class="form-control">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="lg-space"></div>
            <div class="row">
                <div class="container">
                    <div class="card-columns">

                        @if($articles->count() < 1)
                            <div class="col-12">
                                <div class="alert alert-danger">No articles found<br>
                                    <a href="{{url('/member/articles')}}">Go back</a></div>
                            </div>

                        @else
                            @foreach ($articles as $article)
                                <div class="col">
                                    <div class="card box-shadow">
                                        {{--  <div class="card-header">--}}
                                        <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQ-qSKUAn_Wrf2ual1MutbimsksDls9P-cEhqudvlWTLtaxtGrwg" alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">
                                                <a class="text-black"
                                                   href="{{URL::to('member/articles/'. $article->id .'')}}">
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
                                            <p class="card-text">{!! $article->body !!}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small>Posted by: {{ App\User::find($article->posted_by)->firstname}} on
                                                - {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y')}}</small>

                                            @if($article->modifiedBy != 0)
                                                <small>Modified
                                                    By: {{ App\User::find($article->modifiedBy)->userFirstName  }}
                                                    on
                                                    - {{ \Carbon\Carbon::parse($article->updated_at)->format('d/m/Y')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <br>
                    <div class="row">


                        <div class="col-4 align-self-end">
                            {{ $articles->links() }}
                        </div>

                    </div>

                </div>

            </div>

    </section>


@endsection
