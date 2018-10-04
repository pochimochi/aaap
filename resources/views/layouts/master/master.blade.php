<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset('images/logos/logoicontest.png')}}">
    <link rel="shortcut icon" href="{{asset('images/logos/logoicontest.png')}}">

    <link rel="stylesheet" href="{{asset('')}}assets/css/normalize.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/style.css">
    <link href="{{asset('')}}assets/weather/css/weather-icons.css" rel="stylesheet"/>
    <link href="{{asset('')}}assets/calendar/fullcalendar.css" rel="stylesheet"/>


    <link href="{{asset('')}}assets/css/charts/chartist.min.css" rel="stylesheet">
    <link href="{{asset('')}}assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>


</head>
<body>
<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">Dashboard</li><!-- /.menu-title -->
                <li><a href="#about"><i class="menu-icon fa fa-info-circle"></i>About</a></li>
                <li>
                    <a href="{{URL::to('/home')}}" data-toggle="tooltip" data-placement="top"
                       title="Tooltip on top"><i
                                class="menu-icon fa fa-home"></i>Home</a>

                @if(session('role') == 1)
                    <li><a href="{{URL::to('/admin/adminMaintenance')}}"><i class="menu-icon fa fa-users"></i>Administrators</a>
                    </li>
                    <li><a href="{{URL::to('/admin/members')}}"><i class="menu-icon fa fa-user"></i>Members</a></li>
                @elseif(session('role') == 2)
                    <li><a href="{{URL::to('writer/articles')}}"><i
                                    class="menu-icon fa fa-book"></i>View Articles</a></li>
                    <li><a href="{{URL::to('writer/articles/create')}}"><i
                                    class="menu-icon fa fa-plus-circle"></i>Create an Article</a></li>
                    <li><a href="{{URL::to('writer/newsletter')}}"><i
                                    class="menu-icon fa fa-mail-forward"></i>Newsletters</a></li>
                @elseif(session('role') == 3)
                    <li><a href="{{URL::to('/contentmanager/event')}}"><i class="menu-icon fa fa-calendar-check-o"></i>Event</a></li>
                    <li><a href="{{URL::to('/contentmanager/announcements/create')}}"><i class="menu-icon fa fa-bookmark"></i>Announcements</a>
                    </li>
                @endif
                <li>
                    <hr>
                </li>
                @if(!session()->exists('user'))
                    <li><a href="{{URL::to('/login')}}"><i class="menu-icon fa fa-sign-in"></i>Login</a></li>

                    <li><a href="{{URL::to('/register')}}"><i class="menu-icon fa fa-registered"></i>Register</a></li>
                @else

                    <li><a href="{{URL::to('/profile')}}"><i class="menu-icon fa fa-laptop"></i>Profile</a></li>
                    <li><a href="{{URL::to('/logout')}}"><i class="menu-icon fa fa-sign-out"></i>Logout</a></li>
                @endif

                {{-- <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                <ul class="sub-menu children dropdown-menu">

                </ul>
            </li>--}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="./"><img src="{{asset('images/logos/logotexttest.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('images/logos/logoicontest.png')}}"
                                                              alt="Logo"></a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                    {{-- <button class="search-trigger"><i class="fa fa-search"></i></button>
                     <div class="form-inline">
                         <form class="search-form">
                             <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                             <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                         </form>
                     </div>
 --}}

                </div>
                <div class="user-area dropdown float-right">
                    @if(session()->exists('user'))



                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{asset('')}}images/admin.jpg"
                                 alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="{{URL::to('/profile')}}"><i class="fa fa-user"></i>My Profile</a>

                            <a class="nav-link" href="{{URL::to('/logout')}}"><i class="fa fa-power-off"></i>Logout</a>

                        </div>

                    @else
                        <a href="{{URL::to('/login')}}"><i class="menu-icon fa fa-sign-in"></i> Login</a>
                    @endif
                </div>
            </div>
        </div>
    </header><!-- /header -->


    @yield('content')

    <div class="clearfix"></div>

    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; 2018 Ela Admin
                </div>
                <div class="col-sm-6 text-right">
                    Designed by <a href="https://colorlib.com">Colorlib</a>
                </div>
            </div>
        </div>
    </footer>
</div><!-- /#right-panel -->

<!-- Right Panel -->
<script type="text/javascript">

    $('#btnSubmit, #btnChange').on('click', function (e) {
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
<script src="{{asset('assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/datatables-init.js')}}"></script>


<script src="{{asset('assets/js/lib/chart-js/Chart.bundle.js')}}"></script>


<!--Chartist Chart-->
<script src="{{asset('assets/js/lib/chartist/chartist.min.js ')}}"></script>
<script src="{{asset('assets/js/lib/chartist/chartist-plugin-legend.js')}}"></script>


<script src="{{asset('assets/js/lib/flot-chart/jquery.flot.js')}}"></script>
<script src="{{asset('assets/js/lib/flot-chart/jquery.flot.pie.js ')}}"></script>
<script src="{{asset('assets/js/lib/flot-chart/jquery.flot.spline.js ')}}"></script>


<script src="{{asset('assets/weather/js/jquery.simpleWeather.min.js ')}}"></script>
<script src="{{asset('assets/weather/js/weather-init.js ')}}"></script>


<script src="{{asset('assets/js/lib/moment/moment.js')}}"></script>
<script src="{{asset('assets/calendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/calendar/fullcalendar-init.js')}}"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweetalert::alert')

<script type="text/javascript">
    $('table').DataTable({});
</script>


<script>
    jQuery(document).ready(function ($) {
        "use strict";

        // Pie chart flotPie1
        var piedata = [
            {label: "Desktop visits", data: [[1, 32]], color: '#5c6bc0'},
            {label: "Tab visits", data: [[1, 33]], color: '#ef5350'},
            {label: "Mobile visits", data: [[1, 35]], color: '#66bb6a'}
        ];

        $.plot('#flotPie1', piedata, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.65,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        threshold: 1
                    },
                    stroke: {
                        width: 0
                    }
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });

        // Pie chart flotPie1  End


        var cellPaiChart = [
            {label: "Direct Sell", data: [[1, 65]], color: '#5b83de'},
            {label: "Channel Sell", data: [[1, 35]], color: '#00bfa5'}
        ];
        $.plot('#cellPaiChart', cellPaiChart, {
            series: {
                pie: {
                    show: true,
                    stroke: {
                        width: 0
                    }
                }
            },
            legend: {
                show: false
            }, grid: {
                hoverable: true,
                clickable: true
            }

        });


        // Line Chart  #flotLine5
        var newCust = [[0, 3], [1, 5], [2, 4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

        var plot = $.plot($('#flotLine5'), [{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });

        // Line Chart  #flotLine5 End


        // Traffic Chart using chartist
        if ($('#traffic-chart').length) {
            var chart = new Chartist.Line('#traffic-chart', {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                series: [
                    [0, 18000, 35000, 25000, 22000, 0],
                    [0, 33000, 15000, 20000, 15000, 300],
                    [0, 15000, 28000, 15000, 30000, 5000]
                ]
            }, {
                low: 0,
                showArea: true,
                showLine: false,
                showPoint: false,
                fullWidth: true,
                axisX: {
                    showGrid: true
                }
            });

            chart.on('draw', function (data) {
                if (data.type === 'line' || data.type === 'area') {
                    data.element.animate({
                        d: {
                            begin: 2000 * data.index,
                            dur: 2000,
                            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                            to: data.path.clone().stringify(),
                            easing: Chartist.Svg.Easing.easeOutQuint
                        }
                    });
                }
            });
        }
        // Traffic Chart using chartist End


        //Traffic chart chart-js
        if ($('#TrafficChart').length) {
            var ctx = document.getElementById("TrafficChart");
            ctx.height = 150;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                    datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [0, 2900, 5000, 3300, 6000, 3250, 0]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [0, 4200, 4500, 1600, 4200, 1500, 4000]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0]
                        }
                    ]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    }

                }
            });
        }
        //Traffic chart chart-js  End


        // Bar Chart #flotBarChart
        $.plot("#flotBarChart", [{
            data: [[0, 18], [2, 8], [4, 5], [6, 13], [8, 5], [10, 7], [12, 4], [14, 6], [16, 15], [18, 9], [20, 17], [22, 7], [24, 4], [26, 9], [28, 11]],
            bars: {
                show: true,
                lineWidth: 0,
                fillColor: '#ffffff8a'
            }
        }], {
            grid: {
                show: false
            }
        });
        // Bar Chart #flotBarChart End

    });  // End of Document Ready
</script>

<div id="container">


</div>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
