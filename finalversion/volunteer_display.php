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
                <h2>Event Details</h2>
            </div>
        
            <div class="row">
                <?php
                $e_id = $_GET['id']; //Retrieve event ID
                   
                $sql = "SELECT * FROM heartBeat_events WHERE event_id='$e_id'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
  
                if ($resultCheck > 0) 
                {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
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
                                                    <?php echo $row['event_description']; ?> <br>
                                                    <?php echo "Strat Date: " . $row['event_startdate'];?> <br>
                                                    <?php echo "End Date: " . $row['event_enddate']; ?> <br>
                                                    <?php echo "Host Name: " . $row['event_contactfname'] . " " . $row['event_contactlname'];?> <br>
                                                    <?php echo "Host email: " . $row['event_contactemail']; ?> <br>
                                                    <?php echo "Host Contact Number: " . $row['event_contactnumber']; ?> <br>
                                                    <?php echo "Event Location: " . $row['event_location']; ?> <br>
                                                    <?php echo "Event Address: " . $row['event_address']; ?> <br>
                                                    <?php echo "Target Volunteers: " . $row['event_targetvolunteers']; ?> <br>
                                                </p>
                                                <div>
                                                    <?php 
                                                    $e_id = $_GET['id'];
                                                    
                                                    $sql_2 = "SELECT heartBeat_volunteering.volunteer_id FROM heartBeat.heartBeat_volunteering
                                                        WHERE heartBeat_volunteering.event_id IN
                                                        (SELECT heartBeat_events.event_id FROM heartBeat.heartBeat_events
                                                        WHERE heartBeat_events.event_id = '$e_id')";

                                                    $result_2 = mysqli_query($conn, $sql_2);
                                                    $resultCheck_2 = mysqli_num_rows($result_2);
                                                    
                                                    //Check if target volunteer count has been reached.
                                                    if ($resultCheck_2 < $row['event_targetvolunteers']) 
                                                    {   
                                                    ?>  <a href="process_event_register.php?e_id=<?php echo $row['event_id'];?>&e_startdate=<?php echo $row['event_startdate']?>" class="primary_btn">Register now</a>
                                                    <?php 
                                                        
                                                    } else {echo "<a class='genric-btn disable radius'>Volunteer Target Reached</a>";} ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                        }
                } else {echo "No data.";}?>
                        </div>
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

