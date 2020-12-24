<?php
$fname = $lname = $email = $pwd_hashed = $errorMsg = "";
$success = true;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //first name
    if (empty($_POST["fname"]))
    {
        $errorMsg .= "First name is required.<br>";
        $success = false;
    }
    else
    {
        $fname = sanitize_input($_POST["fname"]);
    }
    //last name
    if (empty($_POST["lname"]))
    {
        $errorMsg .= "Last name is required.<br>";
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
    
    else if (empty($_POST["pwd"]) || empty($_POST["pwd_confirm"]))
    {
        $errorMsg .= "Password and confirmation are required.<br>";
        $success = false;
    }
    else
    {
        if ($_POST["pwd"] != $_POST["pwd_confirm"])
        {
            $errorMsg .= "Passwords do not match.<br>";
            $success = false;
        }
        else
        {
            $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
        }
    }
    
    if ($success)
    {
        saveMemberToDB();
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
function saveMemberToDB()
{
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
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
        $stmt = $conn->prepare("INSERT INTO heartBeat_users (emailaddr, fname, lname, password) VALUES (?, ?, ?, ?)");
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


<html lang="en">
    <head>
        <?php if ($success) { header("Refresh:3; url=login.php");} else {header("Refresh:3; url=register.php");}?>
        <?php include "head.inc.php"; ?>
        <link rel="stylesheet" href="css/login_register.css">
    </head>
<body>
    <?php include "nav.inc.php"; ?>
        <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Register</h2>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <div class="container">
    <div class="login-page">
        <div class="form">
        <?php
            if ($success)
            {
                echo "<h4>Thank you for signing up</h4><br>";
                echo "<h3><span style='color: #4E9E0E;'>Please wait for a few seconds, heading to login page...</span></h3>";
            }
            else
            {
                echo "<h4>". $errorMsg ."</h4><br>";
                echo "<h3><span style='color: #4E9E0E;'>Please wait for a few seconds, heading back to registration page...</span></h3>";
            }
            ?>
        </div>
    </div>
    </div>
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