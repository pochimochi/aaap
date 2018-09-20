<!DOCTYPE html>
<html lang="en">

@include('layouts.master.header')
<body>
@include('layouts.home.homenav')
@include('layouts.home.breadcrumb')

@if(count($users) > 1)
    @foreach($users as $user)
        <div class="container-fluid">
            <h3>{{$user->firstName}}</h3>
            <h4>{{$user->lastName}}</h4>
            <h4>{{$user->userId}}</h4>

        </div>
    @endforeach
@else
    <p>No users found</p>
@endif

@include('layouts.master.footer')
</body>
</html>