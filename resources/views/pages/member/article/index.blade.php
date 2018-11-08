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
                        <div class="col-lg-4 col-md-6 col-sm-12">
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
                    @if($articles->count() < 1)
                        <div class="col-12">
                            <div class="alert alert-default mt-5">Records not available.<br>
                            </div>
                            <div class="card-columns">
                                @else
                                    @foreach ($articles as $article)
                                        <div class="col mt-5">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <div class="row">
                                                        @if(!$article->image->isEmpty())
                                                            <div class="col-lg-6 col-12">
                                                                <div id="carouselExampleFade{{$article->id}}"
                                                                     class="border carousel slide carousel-fade"
                                                                     data-ride="carousel">
                                                                    <div class="carousel-inner">
                                                                        @php $i = 0 @endphp
                                                                        @foreach($article->image as $name)

                                                                            <div
                                                                                class="carousel-item @if($i == 0) active @endif">
                                                                                <img
                                                                                    src="{{asset('/storage/'.$name->location)}}"
                                                                                    style="object-fit: scale-down"
                                                                                    class="d-block w-100" height="250"
                                                                                    alt="no-image">
                                                                            </div>
                                                                            @php $i++ @endphp
                                                                        @endforeach
                                                                    </div>
                                                                    <a class="carousel-control-prev"
                                                                       href="#carouselExampleFade{{$article->id}}"
                                                                       role="button"
                                                                       data-slide="prev">
                                                                        <span class="carousel-control-prev-icon"
                                                                              aria-hidden="true"></span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                    <a class="carousel-control-next"
                                                                       href="#carouselExampleFade{{$article->id}}"
                                                                       role="button"
                                                                       data-slide="next">
                                                                        <span class="carousel-control-next-icon"
                                                                              aria-hidden="true"></span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                </div>

                                                            </div>
                                                        @endif
                                                        <div class="col">
                                                            @if(session('user') && Auth::user())
                                                                <a class="display-4 mb-0"
                                                                   href="{{URL::to('member/articles/'. $article->id .'')}}">
                                                                    {{ $article->title}}
                                                                </a>
                                                            @else
                                                                <div class="display-4">
                                                                    {{ $article->title}}
                                                                </div>
                                                            @endif
                                                            <small>
                                                                @if (session('role') != 4)
                                                                    @if($article->status == 0)
                                                                        <span
                                                                            class="badge badge-danger float-right mt-1">Archived</span>
                                                                    @else
                                                                        <span
                                                                            class="badge badge-success float-right mt-1">Active</span>
                                                                    @endif
                                                                @endif
                                                            </small>
                                                            <p class="card-text">{!! $article->body !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <small class="text-muted"><b> Posted
                                                            by: </b> {{ App\User::find($article->posted_by)->firstname . ' ' . $article->user->lastname}}
                                                        on
                                                        {{ \Carbon\Carbon::parse($article->created_at)->format('F d, Y')}}
                                                    </small>
                                                    <br>
                                                    @if($article->modified_by != 0)
                                                        <small class="text-muted"><b> Modified
                                                                By: </b>{{ App\User::find($article->modified_by)->firstname . ' ' . $article->user->lastname }}
                                                            on
                                                            {{ \Carbon\Carbon::parse($article->updated_at)->format('F d, Y')}}
                                                        </small>
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
