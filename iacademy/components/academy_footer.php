<footer class="footer-area section_gap bg-transparent">
    <div class="container">
        <div class="row footer-bottom justify-content-center my-lg-4">
            <p class="footer-text m-0">
                &copy; Copyright <script>document.write(new Date().getFullYear());</script> All Rights Reserved | Powered By &copy; <a href='ibrandafrica.com' target="_blank" style="color: #00aabd">iBrand Africa Group</a>
            </p>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->
<!--CONFIG -->
<script type='text/javascript' src='config.js'></script>
<!-- Optional JavaScript -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/outline.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!--for html to PDF-->
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<!--<script src="js/owl-carousel-thumb.min.js"></script>-->
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/gmaps.min.js"></script>
<!--<script src="js/theme.js"></script>-->
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!--FOR ALERT-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Custom scripts for this template -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-grayscale/5.0.9/js/grayscale.js"></script>
<script src="js/custom.js"></script>
<script src="./vendor/player/lottie.js" type="text/javascript"></script>

<script>
    // check if input is focus
    const fname = $("input[name=fname]");
    const lname = $("input[name=lname]");
    const email = $("input[name=email]");
    const phone = $("input[name=phone]");
    const country = $("input[name=country]");
    const nationality = $("input[name=nationality]");

    fname.focusin(function() {
        $('.inputText.1').addClass("active-input");
    });
    fname.focusout(function() {
        $('.inputText.1').removeClass("active-input");
    });
    lname.focusin(function() {
        $('.inputText.2').addClass("active-input");
    });
    lname.focusout(function() {
        $('.inputText.2').removeClass("active-input");
    });
    email.focusin(function() {
        $('.inputText.3').addClass("active-input");
    });
    email.focusout(function() {
        $('.inputText.3').removeClass("active-input");
    });
    phone.focusin(function() {
        $('.inputText.4').addClass("active-input");
    });
    phone.focusout(function() {
        $('.inputText.4').removeClass("active-input");
    });
    country.focusin(function() {
        $('.inputText.5').addClass("active-input");
    });
    country.focusout(function() {
        $('.inputText.5').removeClass("active-input");
    });
    nationality.focusin(function() {
        $('.inputText.6').addClass("active-input");
    });
    nationality.focusout(function() {
        $('.inputText.6').removeClass("active-input");
    });
    //################# CHECK URL PARAM FUNCTION ##################
    function queryParameters () {
        let result = {};
        let params = window.location.search.split(/\?|\&/);
        params.forEach( function(it) {
            if (it) {
                let param = it.split("=");
                result[param[0]] = param[1];
            }
        });
        return result;
    }
    if (queryParameters().enroll === "true"){
        $('#formmodal').modal('show');
    }
    if (queryParameters().error){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Something went wrong!',
            text: 'Please check your connection and try again.',
            showConfirmButton: false,
            timer: 5000
        })
    }

    lottie.loadAnimation({
        container: document.getElementById('stage'), // the dom element that will contain the animation
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: 'iacademy_mb.json' // the path to the animation json
    });

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#logo').removeClass('d-none');
            $('.navbar-toggler').css('visibility', 'visible');
        } else {
            $('#logo').addClass('d-none');
            $('.navbar-toggler').css('visibility', 'hidden');
        }
    });

    $(".input").focus(function() {
        $(this).parent().addClass("focus");
    });

    function reFresh() {
        location.replace("http://www.ibrandafrica.one/iacademy/");
    }

    function scroll_to_enroll(){
        $('html, body').animate({
            scrollTop: $("#enroll").offset().top
        }, 1000)
    };

    // for readmore
    $(document).ready(function() {
        var showChar = 150;
        var ellipsestext = "...";
        var moretext = "Read More";
        var lesstext = "Show less";
        $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar-1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });
</script>
</body>
</html>
