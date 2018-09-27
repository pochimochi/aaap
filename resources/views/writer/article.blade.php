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
                        <h4 class="m-b-0    text-white">Add Article</h4>
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
                            <form action="{{URL::to('/articlesubmit')}}" method="post">
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
                                                        name="articleTypeId">
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
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <select class="form-control custom-select  input-default"
                                                        name="statusId">
                                                    <option>Select Status</option>
                                                    <option value="0">Inactive</option>
                                                    <option value="1">Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input class="btn btn-success btn-rounded" type="submit"
                                           value="Submit">
                                    <input class="btn btn-inverse btn-rounded" type="reset"
                                           value="Cancel">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>List of Articles</h4>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Article Type</th>
                                    {{--<th>Posted By</th>--}}
                                    <th>Date Published</th>
                                    {{--<th>Date Modified</th>--}}
                                    <th>Modified By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>{{ $article->articleId}}</td>
                                        <td>{{ $article->title}}</td>
                                        <td>{{ $article->body}}</td>
                                        <td>{{ $article->articleTypeId}}</td>
                                        <td>{{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y')}}</td>
                                        {{--<td>{{ $article->updated_at}}</td>--}}
                                        <td>{{ $article->modifiedBy}}</td>
                                        <td>{{ $article->statusId == 1 ? 'Active' : 'Inactive'}}</td>
                                        <td><a href="{{URL::to('/articleedit', $article->articleId)}}"
                                               class="btn btn-warning btn-rounded">Edit</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a>
</footer>
@include('layouts.master.footer')
