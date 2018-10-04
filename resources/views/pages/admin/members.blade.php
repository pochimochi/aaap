@include ('layouts.master.header')
@include ('admin.adminmenu')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    function submitForm() {
        $('#submit').trigger("click");
    }
</script>
<script type="text/javascript">

    $('#btnSubmit').on('click', function (e) {
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
    });

</script>
<body class="fix-header fix-sidebar">
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Manage Members</h3></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form id="status" action="{{URL::to('/changemStatus')}}" method="post">
                    @csrf
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
                                        <td><a id="btn" type="submit"
                                               href="{{URL::to('/changemStatus/'. $member->userId. '/'.  ($member->membershipStatus == 1 ? '0' : '1')  .'')}}"
                                               class="btn {{$member->membershipStatus == 1 ? 'btn-success' : 'btn-danger'}}">{{$member->membershipStatus == 1 ? 'Active' : 'Inactive' }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>
                    <button type="submit" class="positive" name="submit" id="submit" hidden="hidden">save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="footer"> © 2018 All rights reserved. Template designed by <a
            href="https://colorlib.com">Colorlib</a>
</footer>
@include('layouts.master.footer')

