<!-- <footer class="container"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>

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
<script src="{{asset('js/custom.min.js')}}"></script>
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
<!--SVG background-->
<script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/anime.min.js')}}"></script>
<script src="{{asset('js/scrollMonitor.js')}}"></script>
<script src="{{asset('js/demo1.js')}}"></script>
<script src="{{asset('https://unpkg.com/file-upload-with-preview')}}"></script>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";

        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var firstName = document.getElementById('firstName');
        var lastName = document.getElementById('lastName');
        var gender = document.getElementById('gender');
        var mobileNumber = document.getElementById('mobileNumber');
        var city = document.getElementById('city');
        var country = document.getElementById('country');
        var emailAddress = document.getElementById('emailAddress');
        var password = document.getElementById('password');

        if (firstName.value.length == 0) {
            document.getElementById("fnErr").innerHTML = "Please enter your first name.";
            firstName.focus();
            return false;
        }
        if (lastName.value.length == 0) {
            document.getElementById("lnErr").innerHTML = "Please enter your last name.";
            lastName.focus();
            return false;
        }
        if (document.getElementById("gender").value == 0) {
            document.getElementById("gErr").innerHTML = "Please select your gender.";
            gender.focus();
            return false;
        }
        if (mobileNumber.value.length == 0) {
            document.getElementById("mnErr").innerHTML = "Please enter your mobile number.";
            mobileNumber.focus();
            return false;
        }

        // if (city.value.length == 0) {
        //     document.getElementById("cErr").innerHTML = "Please enter your city.";
        //     city.focus();
        //     return false;
        // }
        // if (document.getElementById("countryErr").value == 0) {
        //     document.getElementById("countryErr").innerHTML = "Please select your country.";
        //     country.focus();
        //     return false;
        // }
        return true;
    }

    // var $email = $('emailAddress');
    // var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
    // if ($email.val() == '' || !re.test($email.val())) {
    //     alert('Please enter a valid email address.');
    //     return false;


    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
</script>

<script>
    $(document).ready(function () {
        $('#file-input').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                $('#thumb-output').html(''); //clear html of output element
                var data = $(this)[0].files; //this file data

                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
                                $('#thumb-output').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
    $(document).ready(function () {
        $('#id-input').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                $('#thumb1-output').html(''); //clear html of output element
                var data = $(this)[0].files; //this file data

                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
                                $('#thumb1-output').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>
