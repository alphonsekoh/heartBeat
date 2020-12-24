<?php include "session.php"; ?>
<?php include "db.inc.php"; ?>
<!doctype html>
<html lang="en">
    <head>
        <?php include "head.inc.php"; ?>
    </head>
<body>
    <?php include "nav.inc.php"; ?>
    <?php
        //If delete button is pressed, call sql delete.
        $del = $_GET['id'];
        $volunteering_uid = $_SESSION["userid"];
        
        $sql_5 = "DELETE from heartBeat.heartBeat_volunteering where heartBeat_volunteering.event_id='$del'
            AND heartBeat_volunteering.user_id='$volunteering_uid'";
                
                $result_5 = mysqli_query($conn, $sql_5);
                $resultCheck_5 = mysqli_num_rows($result_5);
    ?>
    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
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
                <h2>Your current events</h2>
                <p>Every little effort goes a long way. <?php echo $_SESSION["lname"];?> </p>
            </div>
        
            <div class="row">
                <?php
                $volunteering_uid = $_SESSION["userid"];
                $sql_5 = "SELECT * from heartBeat.heartBeat_events where heartBeat_events.event_id in "
                        . "(select heartBeat_volunteering.event_id from heartBeat.heartBeat_volunteering where heartBeat_volunteering.user_id='$volunteering_uid')";
                
                $result_5 = mysqli_query($conn, $sql_5);
                $resultCheck_5 = mysqli_num_rows($result_5);


                if ($resultCheck_5 > 0) {
                    while ($row = mysqli_fetch_assoc($result_5)) {
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
                                                        <?php echo "Start Date: " . $row['event_startdate'];?> <br>
                                                        <?php echo "Location: " . $row['event_location']; ?> <br>
                                                        <?php echo "Address: " . $row['event_address']; ?> <br>
                                                        <?php echo "Host Contact Number: " . $row['event_contactnumber']; ?> <br>
                                                        <?php echo "Host Contact Email: " . $row['event_contactemail']; ?> <br>
                                                    </p>
                                                    <div>
                                                        <a href="volunteer_display.php?id=<?php echo $row['event_id'];?>"class="genric-btn info radius">Learn More</a>
                                                        <a href="display_registered_events.php?id=<?php echo $row['event_id'];?>"class="genric-btn danger radius">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
            </div>
        </div>
        <div class="container">
            <a href="profile.php" class="primary_btn">Back to Profile</a>
        </div>
    </section>
    <!--================ End Recent Event Area =================-->
    
       	<!--================ Start CTA Area =================-->
	<div class="cta-area section_gap overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h1>Become a volunteer</h1>
                    <p>
                        So seed seed green that winged cattle in. Gathering thing made fly you're 
                        divided deep leave on the medicene moved us land years living.
                    </p>
                    <a href="event_creation.php" class="primary_btn yellow_btn rounded">volunteer with us</a>
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

