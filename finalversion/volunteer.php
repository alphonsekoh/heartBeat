<?php include "session.php"; ?>
<?php include "db.inc.php"; ?>
<!doctype html>
<html lang="en">
    <head>
        <?php include "head.inc.php"; ?>
    </head>
<body>
    <?php include "nav.inc.php"; ?>
    
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center animate__animated animate__zoomIn">
                    <h2>Volunteer Today</h2>
                    <p>HeartBeat has curated the following volunteering opportunities for you.</p>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->
    
    <!--================ Start Recent Event Area =================-->
	<section class="event_area section_gap_top">
        <div class="container">
            <div class="main_title">
                <h2>Current events</h2>
                <p href="login.php">Take part in a fruitful cause.</p>
            </div>
        
            <div class="row">
                <?php
                
                $sql = "SELECT * FROM heartBeat_events"; //sql code to declare condition
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
  
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?> <!--Run containers dynamically -->
                        <div class="col-lg-6">
                                    <div class="single_event">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6">
                                                <figure>
                                                    <img class="img-fluid w-100" src="img/event/e1.jpg" alt="">
                                                    <div class="img-overlay"></div>
                                                </figure>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="content_wrapper">
                                                    <h3 class="title">
                                                        <a><?php echo $row['event_name']; ?></a>
                                                        <h4><?php echo $row['event_cause'] ?></h4>
                                                    </h3>
                                                    <p>
                                                        <?php echo $row['event_description']; ?>
                                                    </p>
                                                    <div>
                                                        <h4>
                                                        <?php echo $row['event_startdate']; ?>
                                                        <?php echo " to " ?>
                                                        <?php echo $row['event_enddate']; ?>
                                                        </h4>
                                                    </div>
                                                    <a href="volunteer_display.php?id=<?php echo $row['event_id'];?>"class="primary_btn">Learn More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {echo "hello";}
                        ?>
            </div>
        </div>
    </section>
    <!--================ End Recent Event Area =================-->
    
       	<!--================ Start CTA Area =================-->
	<div class="cta-area section_gap overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h1>Create a volunteering event</h1>
                    <p>
                        Require some help from good-hearted members of society? Create your own volunteering event with us now!
                    </p>
                    <a href="event_creation.php" class="primary_btn yellow_btn rounded">create volunteering event</a>
                </div>
            </div>
        </div>
    </div>
    <!--================ End CTA Area =================-->
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
	<script src="js/countdown.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/theme.js"></script>
</body>
</html>

