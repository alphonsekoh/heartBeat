<?php include "session.php"; ?>
<!doctype html>
<html lang="en">
    <head>
        <title>heartBeat &#8212; Contact</title>
        <?php include "head.inc.php";?>
    </head>
<body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
       <?php include "nav.inc.php";?>
    </header>
    <!--================ End Header Menu Area =================-->
        
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center animate__animated animate__zoomIn">
                    <h2>Contact Us</h2>
                    <p>Feel free to clarify your doubts with us here.</p>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    
    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
        <div class="container">
            <div id="mapBox" class="mapBox" 
                data-lat="1.38083" 
                data-lon="103.84923" 
                data-zoom="17" 
                data-info="172 Ang Mo Kio Avenue 8, 567739"
                data-mlat="1.38083"
                data-mlon="103.84923">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Singapore</h6>
                            <p>Singapore Institute of Technology heartBeat</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">+65 6592 1189</a></h6>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">2000923@sit.singaporetech.edu.sg</a></h6>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn primary_btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
  
        <!--================Contact Success and Error message Area =================-->
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->
    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>
    <!--================End Contact Success and Error message Area =================-->
	
   	
    <?php include "footer.inc.php";?>
        
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
