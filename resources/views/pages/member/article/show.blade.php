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
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lg-space"></div>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <a class="display-4 mb-0"
                                               href="{{URL::to('member/articles/'. $article->id .'')}}">{{$article->title}}</a>
                                            <br>
                                            @if(session('user')->role_id == 2)
                                                <hr>
                                                @if($article->status_id == 0)
                                                    <div class="alert alert-danger" role="alert">
                                                        This is article is currently archived
                                                    </div>
                                                @else
                                                    <div class="alert alert-info" role="alert">
                                                        This is article is currently active
                                                    </div>
                                                @endif
                                            @endif
                                            <div id="carouselExampleFade" class="border carousel slide carousel-fade"
                                                 data-ride="carousel">
                                                <div class="carousel-inner">
                                                    @php $i = 0 @endphp
                                                    @foreach($article->image as $name)

                                                        <div class="carousel-item @if($i == 0) active @endif">
                                                            <img src="{{asset('/storage/'.$name->location)}}" style="object-fit: scale-down"
                                                                 class="d-block w-100" height="450" alt="no-image">
                                                        </div>
                                                        @php $i++ @endphp
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                                                   data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                                                   data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <p class="card-text">{!! $article->body !!}</p>
                                            @if(session('user')->userTypeId == 2)
                                                <div class="container">
                                                    <div class="row">
                                                        <a href="{{URL::to('/writer/articles/'.$article->id .'/edit ')}}"
                                                           class="btn btn-outline-info">Edit</a>&nbsp;
                                                        <form action="{{URL::action('ArticleController@destroy', ['articleId' => $article->id])}}"
                                                              method="post">
                                                            @method('DELETE')
                                                            @csrf

                                                            @if ($article->statusId != 0)
                                                                <button type="submit"
                                                                        class="btn btn-outline-danger">Archive
                                                                </button>
                                                            @else
                                                                <button type="submit"
                                                                        class="btn btn-outline-success">Restore
                                                                </button>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                            <hr>
                                            <small class="text-muted"><b>Posted
                                                    by: </b>{{ App\User::find($article->posted_by)->firstname . ' ' . $article->user->lastname}}
                                                on {{ \Carbon\Carbon::parse($article->created_at)->format('F d, Y')}}
                                            </small>
                                            @if($article->modified_by != 0)
                                                <small class="text-muted"><b>Modified
                                                        By: </b> {{ App\User::find($article->modified_by)->firstname . ' ' . App\User::find($article->modified_by)->lastname}}
                                                    on {{ \Carbon\Carbon::parse($article->updated_at)->format('F d, Y')}}
                                                </small>
                                                &nbsp;@endif
                                            <div class="row justify-content-end">
                                                <a class="btn btn-rounded btn-primary"
                                                   href="{{URL::to('/member/articles')}}">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




@endsection