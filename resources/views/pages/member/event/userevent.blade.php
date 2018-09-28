<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@include('layouts.master.header')
<body class="fix-header fix-sidebar">
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
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Posted By</th>
                        <th>Modified By</th>
                        {{--<th>Date Posted</th>--}}
                        {{--<th>Date Modified</th>--}}
                        <th>Type</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->eventId }}</td>
                            <td>{{ $event->eventName }}</td>
                            <td>{{ $event->eventDescription }}</td>
                            <td>{{ $event->postedBy }}</td>
                            <td>{{ $event->modifiedBy }}</td>
                            <td>{{ $event->isPaid== 1 ? 'General' : 'Special'}}</td>
                            <td>{{ $event->status== 1 ? 'Active' : 'Inactive'}}</td>
                            <td>{{ $event->endDate }}</td>
                            <td><a href="{{URL::to('/event', $event->eventId)}}"
                                   class="btn btn-warning btn-rounded">Join</a></td>
                            <td><a href="{{URL::to('/eventview', $event->eventId)}}"
                                   class="btn btn-warning btn-rounded">View</a></td>
                            {{--<td><a href="{{URL::to('/eventdelete', $event->eventId)}}"--}}
                            {{--class="btn btn-warning btn-rounded">Delete</a></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </table>

            </div>
        </div>
    </div>
</div>
@include('layouts.master.footer')
</body>
</html>
