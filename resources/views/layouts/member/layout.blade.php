<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>AAAP Today</title>
    <meta name="description" content="This theme is best suitable for Saas app and service based startups.">
    <meta name="keywords" content="SaaS App Theme">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Standard favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">

    <!-- Helps prevent duplicate content issues -->
    <link rel="canonical" href="https://themesfor.app/preview/actium">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Facebook Open Graph -->
    <meta property="og:title" content="Actium SaaS App Theme: Themes For App. It's Free."/>
    <meta property="og:image" content="https://themesfor.app/preview/assets/images/actium.png"/>
    <meta property="og:site_name" content="Themes For App: 4 new themes every 4 weeks. It's Free."/>
    <meta property="og:description" content="This theme is best suitable for Saas app and service based startups."/>

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="https://themesfor.app/themes/actium">
    <meta name="twitter:title" content="Actium SaaS App Theme: Themes For App. It's Free.">
    <meta name="twitter:description" content="This theme is best suitable for Saas app and service based startups.">
    <meta name="twitter:image" content="https://themesfor.app/preview/assets/images/actium.png">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:500,700,900"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css"
          integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assetsuser/css/bootstrap.min.css">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assetsuser/css/default.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- Color CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assetsuser/css/color.css">

    <!-- Font CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assetsuser/css/font.css">

    <!-- Button CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assetsuser/css/button.css">

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assetsuser/css/style.css">
</head>

<body class="text-black base-font-size" id="page-top">

<div class="wrapper h-100">



    @yield('content')
</div>
<script>
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(51.508742, -0.120850),
            zoom: 5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

<!-- jQuery Script -->
<script src="{{asset('')}}assetsuser/js/jquery.min.js"></script>

<!-- Popper Script -->
<script src="{{asset('')}}assetsuser/js/popper.min.js"></script>

<!-- Bootstrap Script -->
<script src="{{asset('')}}assetsuser/js/bootstrap.min.js"></script>

<!-- Main Script -->
<script src="{{asset('')}}assetsuser/js/main.js"></script>
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
<script type="text/javascript">
    $('table').DataTable({});
</script>
</body>

</html>