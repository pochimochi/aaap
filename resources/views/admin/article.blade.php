<!DOCTYPE html>
<html lang="en">

<head>
    <title>Association for Adults with Autism Philippines</title>
    <!-- RICH TEXT EDITOR -->
    <script src="js/ckeditor/ckeditor.js"></script>
</head>
@include('layouts.master.header')
<body class="fix-header fix-sidebar">
@include('layouts.admin.adminhomenav')
@include('layouts.admin.adminsidebar')
<!-- Preloader - style you can find in spinners.css -->
{{--<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>--}}
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
<!-- End header header -->
    <!-- Left Sidebar  -->
    <div class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider"></li>
                    <li class="nav-label">Dashboard</li>
                    <li><a href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span
                                    class="hide-menu">Dashboard 1</span></a>
                    </li>
                    <li><a href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span
                                    class="hide-menu">Dashboard 2</span></a>
                    </li>
                    <li class="nav-label">Manage Contents</li>
                    <li><a href="adminevents.php" aria-expanded="false"><i class="fa fa-calendar"></i><span
                                    class="hide-menu">Events</span></a>
                    </li>
                    <li><a href="#" aria-expanded="false"><i class="fa fa-bullhorn"></i><span
                                    class="hide-menu">Announcements</span></a>
                    </li>
                    <li><a href="#" aria-expanded="false"><i class="fa fa-newspaper-o"></i><span
                                    class="hide-menu">Articles</span></a>
                    </li>
                    <li class="nav-label">Manage Users</li>
                    <li><a href="#" aria-expanded="false"><i class="fa fa-user-o"></i><span
                                    class="hide-menu">Members</span></a>
                    </li>
                    <li><a href="#" aria-expanded="false"><i class="fa fa-user-o"></i><span
                                    class="hide-menu">Events Managers and Writers</span></a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </div>
    <!-- End Left Sidebar  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Manage Articles</h3></div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-success">
                        <div class="card-header">
                            <h2 class="m-b-0 text-black">Article Details</h2>
                        </div>
                        <div class="alert alert-success">
                            <h4 class="m-b-auto text-black">Add or Edit</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-elements">
                                <form action="{{URL::to('/articlesubmit')}}" method="post">
                                    @csrf
                                    <div class="form-body">
                                        {{--<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Article ID</label>
                                                    <h4>2</h4>
                                                </div>
                                            </div>
                                        </div>--}}
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
                                                        <option>Select Article Type</option>
                                                        <option value="0">News</option>
                                                        <option value="1">Updates</option>
                                                        <option value="2">Trends</option>
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
                                       {{-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Created At</label>
                                                    <input type="text" name="created_at"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Updated At</label>
                                                    <input type="text" name="updated_at"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>--}}
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
                                                    <select class="form-control custom-select  input-default" name="statusId">
                                                        <option>Select Status</option>
                                                        <option value="0">Status1</option>
                                                        <option value="1">Status2</option>
                                                        <option value="2">Status3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add
                                        </button>
                                        <button type="button" class="btn btn-secondary"> Cancel</button>
                                        <!--  <button type="button" class="btn btn-inverse">Cancel</button>-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>List of Events</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>Article ID</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Date Published</th>
                                <th>Date Modified</th>
                                <th>Modified By</th>
                                <th>Status</th>
                                <th>Article Type</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Imaginary Friends</td>
                                <td>Imaginary yet magical.</td>
                                <td>February 19, 2017</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>Finished</td>
                                <td>Symposium</td>
                                <td>
                                    <button class="btn btn-warning">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
</div>
<!-- End PAge Content -->
</body>

</html>
