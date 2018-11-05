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
                        @if($article->status == 0)
                            <div class="alert alert-danger" role="alert">
                                <b>This is article is currently archived</b>
                            </div>
                        @else
                            <div class="alert alert-success" role="alert">
                                <b>This is article is currently active</b>
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
                                {{--@if ($article->status != 0)--}}
                                    {{--<button type="submit" class="btn btn-danger">Archive</button>--}}
                                {{--@else--}}
                                    {{--<button type="submit" class="btn btn-success">Restore</button>--}}
                                {{--@endif--}}
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
