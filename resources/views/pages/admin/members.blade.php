@include ('layouts.master.header')
@include ('layouts.admin.adminmenu')
<body class="fix-header fix-sidebar">
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Manage Members</h3></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Members</h4>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email Address</th>
                                <th>Date Created</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->userId}}</td>
                                    <td>{{ $member->userFirstName}}</td>
                                    <td>{{ $member->userLastName }}</td>
                                    <td>{{ $member->emailAddress}}</td>
                                    <td>{{ \Carbon\Carbon::parse($member->created_at)->format('d/m/Y')}}</td>
                                    <td>{{ $member->membershipStatus== 1 ? 'Active' : 'Inactive'}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer"> © 2018 All rights reserved. Template designed by <a
            href="https://colorlib.com">Colorlib</a>
</footer>
@include('layouts.master.footer')

