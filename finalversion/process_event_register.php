<?php include "session.php"; ?>
<?php include "db.inc.php"; ?>                 
<?php
//Define variables
$volunteering_uid = $volunteering_eid = $errorMsg = "";
$success = true;

$volunteering_fname = $_SESSION['fname'];
$volunteering_lname = $_SESSION['lname'];

//Validate User_ID if they're in session.
if (empty($_SESSION['userid'])) {
    $errorMsg .= "You're not logged in.<br>";
    $success = false;
} else {
    $volunteering_uid = $_SESSION['userid']; //Session ID
} 

//Validate Event_ID
if (empty($_GET['e_id'])) {
    $errorMsg .= "Event does not exist in Database.<br>";
    $success = false;
} 
else {
    $volunteering_eid = $_GET['e_id']; //Event ID
} 

//Retrieve start date of event
if (empty($_GET['e_startdate'])) {
    $errorMsg .= "Sdate does not exist.<br>";
    $success = false;
} else {
    $e_startdate = $_GET['e_startdate'];
}

//Check if user registered for events on the same date
$sdate_sql = "SELECT event_startdate FROM heartBeat_events WHERE event_startdate = '$e_startdate' AND
    event_id IN (select event_id FROM heartBeat_volunteering WHERE user_id = '$volunteering_uid')";
$result_sdate = mysqli_query($conn, $sdate_sql);
$resultCheck_sdate = mysqli_num_rows($result_sdate);

//If user already has events on that day
if ($resultCheck_sdate > 0) 
{
    $errorMsg .= "You already have an event on that day.<br>";
    $success = false;
}

//Check if user is already registered in event
$sql_3 = "SELECT * FROM heartBeat.heartBeat_volunteering WHERE user_id = '$volunteering_uid' and event_id = '$volunteering_eid'";
$result_3 = mysqli_query($conn, $sql_3);
$resultCheck_3 = mysqli_num_rows($result_3);

//If user already registered for that particular event
if ($resultCheck_3 > 0) 
{
    $errorMsg .= "You have already registered for this event.<br>";
    $success = false;
}

//If no errors
if ($success) 
{
    saveVolunteersToDB();
} 

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function saveVolunteersToDB() 
{
    global $volunteering_uid, $volunteering_eid, $conn, $errorMsg, $success;

    //Create DB connection.
    $conn;

    //Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        echo "DB connect failed.";
        $success = false;
    } 
    else 
    {
        //Prepare DB statement:
        $stmtv = $conn->prepare("INSERT INTO heartBeat.heartBeat_volunteering (user_id, event_id) VALUES (?, ?)");

        //Bind and execute query statement:
        $stmtv->bind_param("ii", $volunteering_uid, $volunteering_eid);

        if ($stmtv->execute()) {
        } 
        else {
            $errorMsg = "Execute failed: (" . $stmtv->errno . ") " . $stmtv->error;
            $success = false;
        }
        $stmtv->close();
    }
    $conn->close();
}
?>
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
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->
    
    <!--================ Start Recent Event Area =================-->
	<section class="event_area section_gap_top">
        <div class="container">
            <div class="main_title">
                <div class="container">
                <?php
                if ($success) {
                    echo "<h3>Your event registration was successful!</h3>";
                    echo "<h4>Thank you for volunteering for a good cause, " . "$volunteering_fname" . " " . "$volunteering_lname" . "</h4>";
                    echo "<br><a href='display_registered_events.php' class='genric-btn success circle arrow'>Return to Profile<span class='lnr lnr-arrow-right'></span></a>";
                } else {
                    echo "<h1>Oops!</h1>";
                    echo "<h4>The following errors were detected:</h4>";
                    echo "<p>" . $errorMsg . "<br></p>";
                    echo "<a href='volunteer.php' class='genric-btn danger circle arrow'>Return to Current Events<span class='lnr lnr-arrow-right'></span></a>";
                }
                ?>
            </div>
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

