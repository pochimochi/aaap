@include ('layouts.master.header')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Association for Adults with Autism Philippines</title>

    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet"/>
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet"/>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="fix-header fix-sidebar">
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <!-- Logo icon -->
                    <!--<b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>-->
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <!--<span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>-->
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
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider"></li>
                    <li class="nav-label">Manage Contents</li>
                    <li><a href="#" aria-expanded="false"><i class="fa fa-bullhorn"></i><span
                                    class="hide-menu">Announcements</span></a>
                    </li>
                    <li><a href="#" aria-expanded="false"><i class="fa fa-newspaper-o"></i><span
                                    class="hide-menu">Articles</span></a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </div>
</div>
<body>
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Manage Announcements</h3></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0    text-white">Edit an Announcement</h4>
                    </div>
                    </br>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="basic-elements">
                            <form method="post"
                                  action="{{action('AnnouncementsController@update', $announcementId)}}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <h6>Announcement ID</h6>
                                                <input type="text" name="announcementId" id="announcementId"
                                                       class="form-control input-default"
                                                       value="{{$announcement->announcementId}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <h6>Title</h6>
                                                <input type="text" name="title" id="title"
                                                       class=" form-control input-default"
                                                       value="{{$announcement->title}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <h6>Announcement Type</h6>
                                                <select class="form-control custom-select input-default"
                                                        name="aTypeId" id="aTypeId">
                                                    <option value="1"
                                                            @if($announcement->aTypeId=="1") selected @endif>
                                                        General
                                                    </option>
                                                    <option value="0"
                                                            @if($announcement->aTypeId=="0") selected @endif>
                                                        Special
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <h6>Status</h6>
                                                <select class="form-control custom-select input-default"
                                                        name="statusId" id="statusId">
                                                    <option value="1"
                                                            @if($announcement->statusId=="1") selected @endif>
                                                        Active
                                                    </option>
                                                    <option value="0"
                                                            @if($announcement->statusId=="0") selected @endif>
                                                        Inactive
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <h6>Description</h6>
                                                <input type="text" class=" form-control input-default"
                                                       name="description" id="description"
                                                       value="{{$announcement->description}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <h6>Posted By</h6>
                                                <input type="text" name="postedBy" id="postedBy"
                                                       class=" form-control input-default"
                                                       value="{{$announcement->postedBy}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <h6>Modified By</h6>
                                                <input type="text" name="modifiedBy" id="modifiedBy"
                                                       class=" form-control input-default"
                                                       value="{{$announcement->modifiedBy}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <h6>Due Date</h6>
                                                <input type="date" name="dueDate" id="dueDate"
                                                       class=" form-control input-default"
                                                       value="{{$announcement->dueDate}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input class="btn btn-success btn-rounded" type="submit"
                                           value="Update">
                                    <a href="{{URL::to('/announcement')}}" class="btn btn-dark btn-rounded">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a>
</footer>

<!--All Jquery-->
<script src="js/lib/jquery/jquery.min.js"></script>
<!--Bootstrap tether Core JavaScript-->
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<!--slimscrollbar scrollbar JavaScript-->
<script src="js/jquery.slimscroll.js"></script>
<!--Menu sidebar-->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit-->
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript-->
<script src="js/custom.min.js"></script>