@include('layouts.master.header')

<div id="main-wrapper">
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!--toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted  "
                                            href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                    <li class="nav-item m-l-10"><a class="nav-link sidebartoggler hidden-sm-down text-muted  "
                                                   href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                </ul>
                <!-- User profile -->
                <ul class="navbar-nav my-lg-0">
                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user"
                                                                           class="profile-pic"/></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider"></li>
                    <li class="nav-label">Manage Contents</li>
                    <li><a href="{{URL::to('/announcement')}}" aria-expanded="false"><i
                                    class="fa fa-newspaper-o"></i><span
                                    class="hide-menu">Articles</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Manage Articles</h3></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0    text-white">Article</h4>
                    </div>
                    <br>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="basic-elements">
                            <form method="post" action="{{action('ArticleController@update', $articleId)}}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Article ID</label>
                                                <input type="text" name="articleId" id="articleId"
                                                       class="form-control input-default"
                                                       value="{{$article->articleId}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Title</label>
                                                <input type="text" name="title" id="title"
                                                       class=" form-control input-default"
                                                       value="{{$article->title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Article Type</label>
                                                <select class="form-control custom-select input-default"
                                                        name="articleTypeId" value="{{$article->articleTypeId}}">
                                                    <option value="1" @if($article->articleTypeId=="1") selected @endif>
                                                        Case Studies
                                                    </option>
                                                    <option value="2" @if($article->articleTypeId=="2") selected @endif>
                                                        Commentaries
                                                    </option>
                                                    <option value="3" @if($article->articleTypeId=="3") selected @endif>
                                                        Methodologies
                                                    </option>
                                                    <option value="4" @if($article->articleTypeId=="4") selected @endif>
                                                        Reports
                                                    </option>
                                                    <option value="5" @if($article->articleTypeId=="5") selected @endif>
                                                        Research
                                                    </option>
                                                    <option value="6" @if($article->articleTypeId=="6") selected @endif>
                                                        Review
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{--<label class="control-label">Body</label>--}}
                                            <h6>Body</h6>
                                            <!--Insert Rich Text Editor Here-->
                                            <textarea class="ckeditor" name="body" id="body"
                                                      value="{{$article->body}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Modified By</label>
                                            <input type="text" name="modifiedBy" id="modifiedBy"
                                                   class=" form-control input-default"
                                                   value="{{$article->modifiedBy}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <select class="form-control custom-select  input-default"
                                                    name="statusId">
                                                <option>Select Status</option>
                                                <option value="0"
                                                        @if($article->statusId=="0") selected @endif>
                                                    Inactive
                                                </option>
                                                <option value="1"
                                                        @if($article->statusId=="1") selected @endif>
                                                    Active
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-actions">
                            <input class="btn btn-success btn-rounded" type="submit"
                                   value="Update">
                            <a href="{{URL::to('/article')}}" class="btn btn-dark btn-rounded">Back</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer"> © 2018 All rights reserved. Template designed by <a
            href="https://colorlib.com">Colorlib</a>
</footer>
@include('layouts.master.footer')

