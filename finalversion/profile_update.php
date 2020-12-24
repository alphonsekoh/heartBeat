<?php
// Start the session
session_start();
?>
<?php
$fname = $lname = $email = $pwd_hashed = $errorMsg = "";
$success = true;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //first name
    if (!empty($_POST["fname"]))
    {
        //$errorMsg .= "First name is required,<br>";
        $fname = sanitize_input($_POST["fname"]);
    }
    //last name
    if (empty($_POST["lname"]))
    {
        $errorMsg .= "Last name is required,<br>";
        $success = false;
    }
    else
    {
        $lname = sanitize_input($_POST["lname"]);
    }
    //email
    if (empty($_POST["email"]))
    {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    }
    else
    {
        $email = sanitize_input($_POST["email"]);
        // Additional check to make sure e-mail address is well-formed.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errorMsg .= "Invalid email format.";
            $success = false;
        }
    }
    //password
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $_POST["pwd"]);
    $lowercase = preg_match('@[a-z]@', $_POST["pwd"]);
    $number    = preg_match('@[0-9]@', $_POST["pwd"]);
    //$specialChars = preg_match('@[^\w]@', $_POST["pwd"]);

    if(!$uppercase || !$lowercase || !$number || strlen($_POST["pwd"]) < 8) {
        $errorMsg .= "Password should be at least 8 characters in length and should include at least one upper case letter and one number";
        $success = false;
    }
    
    else if (empty($_POST["pwd"]))
    {
        $errorMsg .= "Password is required.<br>";
        $success = false;
    }
    else
    {
        $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
    }
    
    if ($success)
    {
        updateDB();
    }
}
else
{
    echo "<h2>This pages is not meant to be run directly.</h2>";
    echo "<p>You can register at the link below</p>";
    echo "<a href = 'register.php'Go to Sign Up page...</a>";
    exit();
}

//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php
/*
* Helper function to write the member data to the DB
*/
function updateDB()
{
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
    $id = $_SESSION["userid"];
    $_SESSION["email"] = $email;
    $_SESSION["fname"] = $fname;
    $_SESSION["lname"] = $lname;
    $_SESSION["password"] = $pwd_hashed;
    // Create database connection.
    $config = parse_ini_file('../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
    // Check connection
    if ($conn->connect_error)
    {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    }
    else
    {
        // Prepare the statement:
        $stmt = $conn->prepare("UPDATE heartBeat_users SET emailaddr=?, fname=?, lname=?, password=? WHERE user_id='$id'");
        // Bind & execute the query statement:
        $stmt->bind_param("ssss", $email, $fname, $lname, $pwd_hashed);
        if (!$stmt->execute())
        {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}
?>


<html>
    <head>
        <?php if ($success) { header("Refresh:3; url=profile.php");} else {header("Refresh:3; url=profile.php");}?>
        <?php include "head.inc.php"; ?>
        <link rel="stylesheet" href="css/login_register.css">
        <title>HeartBeat</title>
    </head>

    <body class ="user_body">
     <?php include "nav.inc.php"; ?>   
<!-- Placeholder values for the time-being-->

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Profile Update</h2>
                </div>
            </div>
        </div>
    </section>
<div class="container">
<div class="login-page">
        <div class="form">
            <?php
            if ($success)
            {
                echo "<h3>Your account is updated successfully</h3><br>";
                echo "<h4><span style='color: #4E9E0E;'>Please wait for a few seconds.. going back to profile page</span></h4>";
            }
            else
            {
                echo "<p>" . $errorMsg . "</p>";
                echo "<h4><span style='color: #4E9E0E;'>Please wait for a few seconds.. going back to profile page</span></h4>";
            }
            ?>
</div>
    </div>
</div>
        <br>
        <?php
            include "footer.inc.php";
        ?>
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