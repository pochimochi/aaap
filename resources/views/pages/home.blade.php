<!DOCTYPE html>
<html lang="en">
@include('layouts.master.header')
<body>
@include('layouts.home.homenav')
@include('layouts.home.breadcrumb')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

    </ol>
    <div class="carousel-inner" id="carousels">
        <div class="carousel-item active">
            <img class="d-block w-100" src="images/1.png"  alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to AAAP!</h5>
                <p>...</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="images/2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>...</h5>
                <p>...</p>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>

<div class="container-fluid">
    <!-- Start Page Content -->

    <h2>Navigation</h2>
    <div class="row">

        <div class="col-md-3">
            <a href="adminevents.php">
                <div class="card bg-primary p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-bag f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">Events</h2>
                            <p class="m-b-0">Latest Events</p>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-md-3">
            <a href="adminarticles.php">
                <div class="card bg-pink p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-comment f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">Articles</h2>
                            <p class="m-b-0">Latest Articles</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="card bg-success p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-vector f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">News</h2>
                            <p class="m-b-0">Latest Announcements</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="card bg-danger p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-location-pin f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">About Us</h2>
                            <p class="m-b-0">Learn More</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@include('layouts.master.footer')
</body>
</html>