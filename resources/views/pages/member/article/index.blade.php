@extends('layouts.member.layout')
@section('navbar')
    @include('layouts.member.header')
    <div class="position-relative">
        <section class="section section-lg section-shaped pb-250">
            <div class="shape shape-style-1 shape-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="col-lg-12">
                <div class="container" align="right">
                    <form action="{{action('ArticleController@searching')}}" method="post">
                        @csrf
                        <div class="col-4">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="ni ni-zoom-split-in"></i></span>
                                    </div>
                                    <input class="form-control" name="search" placeholder="Search Title"
                                           type="text">
                                    <button type="submit" class="btn btn-success"><i
                                                class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                                        <img class="card-img-top"
                                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQ-qSKUAn_Wrf2ual1MutbimsksDls9P-cEhqudvlWTLtaxtGrwg"
                                             alt="Card image cap">
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
    </div>



@endsection
