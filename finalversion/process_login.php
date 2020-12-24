<?php
    session_start();
            ?>
<?php
$fname = $lname = $email = $pwd_hashed = $errorMsg = "";
$success = true;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
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
    if (empty($_POST["pwd"]))
    {
        $errorMsg .= "Password is required.<br>";
        $success = false;
    }
    if ($success)
    {
        authenticateUser();
    }
}
else
{
    echo "<h2>This pages is not meant to be run directly.</h2>";
    echo "<p>You can login at the link below</p>";
    echo "<a href = 'login.php'Go to Login page...</a>";
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
* Helper function to authenticate the login.
*/
    function authenticateUser()
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
            echo 'connection failed';
        }
        else
        {
            // Prepare the statement:
            $stmt = $conn->prepare("SELECT * FROM heartBeat_users WHERE emailaddr=?");
            // Bind & execute the query statement:
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0)
            {
                // Note that email field is unique, so should only have
                // one row in the result set.
                $row = $result->fetch_assoc();
                $fname = $row["fname"];
                $lname = $row["lname"];
                $pwd_hashed = $row["password"];
                // Check if the password matches:
                if (!password_verify($_POST["pwd"], $pwd_hashed))
                {
                    // Don't be too specific with the error message - hackers don't
                    // need to know which one they got right or wrong. :)
                    $errorMsg = "Email not found or password doesn't match...";
                    $success = false;
                    
                }
                else
                {
                    $stmt = $conn->prepare("SELECT * FROM heartBeat_users WHERE emailaddr=?");
                    // Bind & execute the query statement:
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $fname = $row["fname"];
                    $lname = $row["lname"];
                    $pwd_hashed = $row["password"];

                    $_SESSION["email"] = $row["emailaddr"];
                    $_SESSION["userid"] = $row["user_id"];
                    $_SESSION["fname"] = $row["fname"];
                    $_SESSION["lname"] = $row["lname"];
                    $_SESSION["password"] = $row["password"];
                    $_SESSION["pwd"] = $_POST["pwd"];
                }
            }
            else
            {
                $errorMsg = "Email not found or password doesn't match...";
                $success = false;
            }
            $stmt->close();
            }
        $conn->close();
}?>


<html lang="en">
    <head>
        <?php if ($success) { header("Refresh:3; url=index.php");} else {header("Refresh:3; url=login.php");}?>
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
                    <h2>Login</h2>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <div class ="container">
    <div class="login-page">
        <div class="form">
        <?php
            if ($success)
            {
                $_SESSION["last_time"] = time();
                echo "<h3>Welcome back, " . $fname . " " . $lname . "!</h3><br>";
                echo "<h3><span style='color: #4E9E0E;'>Please wait for a few seconds, heading to home page...</span></h3>";
            }
            else
            {
                echo "<h4>". $errorMsg ."</h4><br>";
                echo "<h3><span style='color: #4E9E0E;'>Please wait for a few seconds, heading back to login page...</span></h3>";
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