<?php include "session.php"; ?>
<?php include "db.inc.php"; ?>                
    <?php
    // Define and initialize variables to hold our form data:
    $event_name = $event_cause = $event_organization = $event_description = 
            $event_contactfname = $event_contactlname = $event_contactemail = 
            $event_contactnumber = $event_location = $event_address = 
            $event_startdate = $event_enddate = $event_targetvolunteers = $errorMsg = "";
    $success = true;
    
    $volunteering_fname = $_SESSION['fname'];
    $volunteering_lname = $_SESSION['lname'];
    
    //Validate event name
    if (empty($_POST["event_name"])) {
        $errorMsg .= "Event name is required.<br>";
        $success = false;
    } else {
        $event_name = sanitize_input($_POST["event_name"]);
    }

    //Validate event organization
    if (empty($_POST["event_organization"])) {
        $errorMsg .= "Event organization is required.<br>";
        $success = false;
    } else {
        $event_organization = sanitize_input($_POST["event_organization"]);
    }
    
    $event_cause = sanitize_input($_POST["event_cause"]);
    
    //Validate event description
    if (empty($_POST["event_description"])) {
        $errorMsg .= "Event description is required.<br>";
        $success = false;
    } else {
        $event_description = sanitize_input($_POST["event_description"]);
    }

    //Validate contact first name
    if (!empty($_POST["event_contactfname"])) {
        $event_contactfname = sanitize_input($_POST["event_contactfname"]);
    }

    //Validate contact last name
    if (empty($_POST["event_contactlname"])) {
        $errorMsg .= "Last Name is required.<br>";
        $success = false;
    } else {
        $event_contactlname = sanitize_input($_POST["event_contactlname"]);
    }

    //Validate contact email
    if (empty($_POST["event_contactemail"])) {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    } else {
        $event_contactemail = sanitize_input($_POST["event_contactemail"]);

        // Additional check to make sure e-mail address is well-formed.(validate email format)
        if (!filter_var($event_contactemail, FILTER_VALIDATE_EMAIL)) {
            $errorMsg .= "Invalid email format.<br>";
            $success = false;
        }
    }

    //Validate contact number
    if (empty($_POST["event_contactnumber"])) {
        $errorMsg .= "Contact number is required.<br>";
        $success = false;
    } else {
        $event_contactnumber = sanitize_input($_POST["event_contactnumber"]);

        if (strlen($_POST["event_contactnumber"]) < 8 || strlen($_POST["event_contactnumber"]) > 10 || strlen($_POST["event_contactnumber"]) == 9) {
            $errorMsg .= "Invalid contact number format.<br>";
            $success = false;
        }
    }

    //Validate location
    if (empty($_POST["event_location"])) {
        $errorMsg .= "Location is required.<br>";
        $success = false;
    } else {
        $event_location = sanitize_input($_POST["event_location"]);
    }

    //Validate input address
    if (empty($_POST["event_address"])) {
        $errorMsg .= "Address is required.<br>";
        $success = false;
    } else {
        $event_address = sanitize_input($_POST["event_address"]);
    }

    
    
    
    //Validate start date
    if (empty($_POST["event_startdate"])) {
        $errorMsg .= "Start date is required.<br>";
        $success = false;
    } else {
        $event_startdate = sanitize_input($_POST["event_startdate"]);
    }
    

    //Validate end date
    if (empty($_POST["event_enddate"])) {
        $errorMsg .= "End date is required.<br>";
        $success = false;
    } else {
        $event_enddate = sanitize_input($_POST["event_enddate"]);
    }
    
    //For current time
    date_default_timezone_set('Asia/Singapore');
    $current = date('Y-m-d');
    if (($current > $event_startdate) || ($current > $event_enddate)) {
        $errorMsg .= "Date is past current date.<br>";
        $success = false;
    }

    //Validate end after start date
    if ($event_startdate > $event_enddate)
    {
        $errorMsg .= "Start date cannot be later than End date.<br>";
        $success = false;
    }
    
    //Validate target volunteer
    if (empty($_POST["event_targetvolunteers"])) {
        $errorMsg .= "Target volunteers is required.<br>";
        $success = false;
    } else {
        $event_targetvolunteers = sanitize_input($_POST["event_targetvolunteers"]);
    }
    
    //Parameters to check
    $sql_4 = "SELECT * FROM heartBeat.heartBeat_events WHERE event_name = '$event_name' and event_cause ='$event_cause' and "
            . "event_organization='$event_organization' and event_location='$event_location' and "
            . "event_address = '$event_address' and event_contactnumber='$event_contactnumber'";
    
    $result_4 = mysqli_query($conn, $sql_4);
    $resultCheck_4 = mysqli_num_rows($result_4);

    //If event already exists
    if ($resultCheck_4 > 0) {
        $errorMsg .= "This event already exists.<br>";
        $success = false;
    }
    
    //Session check
    $ses_id = $_SESSION["userid"];
    if (empty($ses_id)){
        $errorMsg .= "You're not logged in.<br>";
        $success = false;
    }
  
    //If no errors
    if ($success) {
        saveEventsToDB();
    }

    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Helper function to write the member data to the DB
    function saveEventsToDB() {
        global $event_name, $event_cause, $event_organization, $event_description,
        $event_contactfname, $event_contactlname, $event_contactemail, $event_contactnumber,
        $event_location, $event_address, $event_startdate, $event_enddate,
        $event_targetvolunteers, $conn, $errorMsg, $success;

        //Create database connection.
        $conn;

        //Check connection
        if ($conn->connect_error) {
            $errorMsg = "Connection failed: " . $conn->connect_error;
            $success = false;
        } else {
            //Prepare the statement;
            $stmt = $conn->prepare("INSERT INTO heartBeat_events 
                        (event_name, event_cause, event_organization, event_description, event_contactfname, 
                        event_contactlname, event_contactemail, event_contactnumber, event_location, 
                        event_address, event_startdate, event_enddate,
                        event_targetvolunteers) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Bind & execute the query statement:
            $stmt->bind_param("sssssssssssss",
                    $event_name, $event_cause, $event_organization, $event_description, $event_contactfname,
                    $event_contactlname, $event_contactemail, $event_contactnumber, $event_location,
                    $event_address, $event_startdate, $event_enddate,
                    $event_targetvolunteers);

            if (!$stmt->execute()) {
                $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                $success = false;
            } else {
            }
            $stmt->close();
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
                <div class="container">
                <?php
                if ($success) {
                    echo "<h3>Your event registration was successful!</h3>";
                    echo "<h4>Thank you for volunteering for a good cause, " . "$volunteering_fname" . " " . "$volunteering_lname" . "</h4>";
                    echo "<a href='volunteer.php' class='btn btn-success'>Return to Profile</a>";
                } else {
                    echo "<h1>Oops!</h1>";
                    echo "<h4>The following errors were detected:</h4>";
                    echo "<p>" . $errorMsg . "</p>";
                    echo "<a href='event_creation.php' class='btn btn-danger'>Return to Registration</a>";
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
                    <a href="#" class="primary_btn yellow_btn rounded">volunteer with us</a>
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

