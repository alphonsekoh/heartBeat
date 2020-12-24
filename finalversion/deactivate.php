<?php include "session.php"; ?>
<?php
$errorMsg = "";
$success = true;

if ($success)
{
    deactivateAcc();
}


?>

<?php
/*
* Helper function to write the member data to the DB
*/
function deactivateAcc()
{
    global $errorMsg, $success;
    $id = $_SESSION["userid"];
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
        $sql="DELETE FROM heartBeat_users WHERE user_id='$id'";
        $result=mysqli_query($conn,$sql);
        if($result){
            $errorMsg = "The account is deactivated successfully.";
        }
    }
}
?>
<?php
       unset($_SESSION["email"]);
       unset($_SESSION["password"]);
       unset($_SESSION["userid"]);
       unset($_SESSION["fname"]);
       unset($_SESSION["lname"]);
       unset($_SESSION["password"]);
       ?>
<html>
    <head>
        <?php if ($success) { header("Refresh:3; url=index.php");} ?>
        <?php include "head.inc.php"; ?>
        <link rel="stylesheet" href="css/login_register.css">
        <title>HeartBeat</title>
    </head>

    <body class ="user_body">
     <?php include "nav.inc.php"; ?>   
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Account Deactivation</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
    <div class="login-page">
        <div class="form">
            <?php
            if($success)
            {
                echo "<h3><p>" . $errorMsg . "</p></h3><br>";
                echo "<h4><span style='color: #4E9E0E;'>Please wait for a few seconds.. going to home page</span></h4>";
            }
            ?>
        </div>
    </div>
    </div>
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