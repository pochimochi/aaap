<footer class="container"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>

<!-- All Jquery -->

<script src="{{asset('js/lib/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('js/lib/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>


<script src="{{asset('js/lib/datamap/d3.min.js')}}"></script>
<script src="{{asset('js/lib/datamap/topojson.js')}}"></script>
<script src="{{asset('js/lib/datamap/datamaps.world.min.js')}}"></script>
<script src="{{asset('js/lib/datamap/datamap-init.js')}}"></script>

<script src="{{asset('js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
<script src="{{asset('js/lib/weather/weather-init.js')}}"></script>
<script src="{{asset('js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/lib/owl-carousel/owl.carousel-init.js')}}"></script>


<script src="{{asset('js/lib/chartist/chartist.min.js')}}"></script>
<script src="{{asset('js/lib/chartist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('js/lib/chartist/chartist-init.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('')}}js/custom.min.js"></script>
<!--https://stackoverflow.com/questions/30930079/how-to-get-bootstrap-carousel-to-fit-100-to-screen -->
<script type="text/javascript">
    $(document).ready(function(){
        var height = $(window).height();  //getting windows height
        jQuery('#carousels').css('height',(height - 120)+'px');   //and setting height of carousel

    });
    $('.carousel').carousel({
        interval: 4000
    })
</script>
