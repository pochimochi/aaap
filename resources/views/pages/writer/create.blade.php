@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Articles
@endsection
@section('header')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->

            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="row">
        <div class="card col-12 shadow">
            <div class="card-header">Create an Article</div>

            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{URL::to('/writer/articles')}}" method="post">
                    @method('Post')
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Title</label>
                                    <input type="text" name="title"
                                           class="form-control input-default">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Article Type</label>
                                    <select class="form-control custom-select input-default"
                                            name="articletype_id">
                                        <option value="">Select Article Type</option>
                                        <option value="1">Case Studies</option>
                                        <option value="2">Commentaries</option>
                                        <option value="3">Methodologies</option>
                                        <option value="4">Reports</option>
                                        <option value="5">Research</option>
                                        <option value="6">Review</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Body</label>
                                    <!--Insert Rich Text Editor Here-->
                                    <textarea class="ckeditor" name="body"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Modified By</label>
                                    <input type="text" name="modifiedBy"
                                           class="form-control  input-default">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <select class="form-control custom-select  input-default"
                                            name="status_id">
                                        <option>Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input class="btn btn-success" type="submit" id="btnsubmit" onclick=""
                               value="Create">
                        <input class="btn btn-inverse" type="reset"
                               value="Reset">
                    </div>
                </form>
            </div>
        </div>


        <div class="card mt-5 col-12 shadow">
            <div class="card-header border-0">
                Articles
            </div>


            <div class="card-body">
                <table id="myTable" class="table table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        {{--<th>Body</th>--}}
                        <th>Date Published</th>
                        <th>Published By</th>
                        {{--  <th>Date Modified</th>
                          <th>Modified By</th>--}}
                        <th>Article Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach ($articles as $article)

                        <tr align="center">
                            <form action="{{action('ArticleController@changeStatus')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$article->id}}">
                                <input type="hidden" name="status_id" value="{{$article->status_id }}">
                                <td>{{ $article->id}}</td>
                                <td>{{ $article->title}}</td>
                                {{--<td>@php echo substr($article->body, 0, 50) . "..." @endphp</td>--}}
                                <td>{{ $article->created_at}}</td>
                                <td>{{ $article->user->firstname . ' ' .$article->user->lastname }}</td>
                                {{--<td>{{ $article->updated_at}}</td>
                                <td>{{ $article->modified_by}}</td>--}}
                                <td>{{ $article->articletype_id /*== 6 ?'Case Studies' : 'Commentaries' : 'Methodologies' : 'Reports' : 'Research' : 'Review'*/ }}</td>
                                <td align="center">
                                    <button type="submit" id="changestatus" onclick="confirm('are you sure?')"
                                            class="btn-sm {{$article->status_id == 1 ? 'btn btn-success' : 'btn btn-rounded btn-danger'}}">{{$article->status_id == 1 ? 'Active' : 'Inactive' }}</button>

                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{URL::to('/writer/articles/'.$article->id.'/edit')}}"
                                               class="btn btn-warning btn-sm " role="button">Edit</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{URL::to('/writer/articles/'.$article->id)}}"
                                               class="btn btn-info btn-sm " role="button">Show</a>
                                        </div>


                                    </div>
                                </td>
                            </form>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>













    {{-- <script type="text/javascript">
         $('#btnsubmit').on('click', function (e) {
             e.preventDefault();
             var form = $(this).parents('form');
             swal({
                 title: 'Are you sure?',
                 text: "You won't be able to revert this!",
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, save it!'
             }).then((result) => {
                 if (result.value) {
                     form.submit();
                 }
             })
         });</script>--}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script>
         function send() {
             preventDefault();
             $.ajax({
                 url: '{{action('ArticleController@changeStatus')}}',
                 type: 'post',
                 data: $('form').serialize(), // Remember that you need to have your csrf token included
                 dataType: 'json',
                 success: function( _response ){
                     alert($('form').serialize())
                 },
                 error: function( _response ){
                     alert($('form').serialize())
                 }
             });

     </script>--}}
@endsection
