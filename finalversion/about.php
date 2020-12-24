<?php include "session.php"; ?>

<!doctype html>
<html lang="en">
    <head>
        <title>heartBeat &#8212; About Us</title>
        <?php include "head.inc.php"; ?>
    </head>
    <body id="about_body">
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
       <?php include "nav.inc.php";?>
    </header>
    <!--================ End Header Menu Area =================-->

        <!--================ Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center animate__animated animate__zoomIn">
                        <h2>About Us</h2>
                        <p>Let us introduce ourselves.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Home Banner Area =================-->

        <!--================ Start About Us Area =================-->
        <!-- Start Founder's Introduction -->
        <section>
            <div class="container-fluid about_area">
                <div class="row justify-content-around">	
                    <div class="col-md-4 img_center">
                        <img src="images/abt_us_founder.jpg" id="founder_img"
                             class="animate__animated animate__backInLeft animate_delay" alt="Jean - member" title="Jean - Founder of HeartBeat"/>
                    </div>
                    <div class="col-md-7 about_right animate__animated animate__backInRight animate_delay">
                        <h2>
                            <b style="color: #B54946">HeartBeat</b> is a charity organisation in Singapore that aims to 
                            help anyone in the community to raise awareness, raise funds 
                            and most importantly, to spread kindness &amp; love to others. 
                        </h2>
                        <h3 id="founder_name">&#8212; Jean Yeo, Founder of HeartBeat</h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Founder's Introduction -->

        <!-- Start carousel -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 item-img" src="images/carousel1.jpg" alt="First slide">
                    <div class="fit_carousel_inner">
                        <h4>&ldquo;Instead of cafe hopping me &amp; my partner enjoy visiting 
                            the dogs' home during our free time.&rdquo;</h4>
                        <p class="testimonial_writer">&#8212; Mike &amp; Alicia</p>
                    </div>

                </div>

                <div class="carousel-item">
                    <img class="d-block w-100 item-img" src="images/carousel2.jpg" alt="Second slide">
                    <div class="fit_carousel_inner">
                        <h4>&ldquo;HeartBeat is a great platform for me to raise enough funds
                            for my grandmother's hospital bills.
                            <br><br>Truly appreciate to receive help here.&rdquo;</h4>
                        <p class="testimonial_writer">&#8212; Sarah</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 item-img" src="images/carousel3.jpg" alt="Third slide">
                    <div class="fit_carousel_inner">
                        <h4>&ldquo;I often would donate a few dollars and share the page on my social 
                            media platform to raise awareness. A little goes a long way.&rdquo;</h4>
                        <p class="testimonial_writer">&#8212; Patrica</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span aria-hidden="true"></span>
                <span class="material-icons carousel_arrows">arrow_back_ios</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span aria-hidden="true"></span>
                <span class="material-icons carousel_arrows">arrow_forward_ios</span>
            </a>
        </div>
        <!-- End carousel -->
        <!--================ End About Us Area =================-->
        <?php include "footer.inc.php"; ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>