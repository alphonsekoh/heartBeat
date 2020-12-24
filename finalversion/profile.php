<?php include "session.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "head.inc.php"; ?>
        <link rel="stylesheet" href="css/login_register.css">
        <title>heartBeat &#8212; Profile</title>
    </head>
<body>
    <?php include "nav.inc.php"; ?>
        <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>User Profile</h2>
                    <h3><p>Update your latest information and stay connected with us! :)</p></h3>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <section>
    <div class="container">
    <div class="login-page">
  <div class="form">
      <div id ="user_info">
    <form class="login-form" action="profile_update.php" method="post" id="user_info">
    <p><span class="error">*all fields are required</span></p>
    <div class="form__group">
            <label for="fname">User ID:</label>
            <input class = "form-control" type="text" id="fname" name="fname" title="First Name" value="<?php echo $_SESSION["userid"];?>" disabled>
        </div>
      <div class="form__group">
            <label for="fname">First Name:</label>
            <input class = "form-control" type="text" id="fname" name="fname" title="First Name" value="<?php echo $_SESSION["fname"];?>">
        </div>
        <div class="form__group">
            <label for="lname">Last Name:</label>
            <input class = "form-control" type="text" id="lname" name="lname" title="Last Name" value="<?php echo $_SESSION["lname"];?>">
        </div>
        <div class="form__group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" title="Email" value="<?php echo $_SESSION["email"];?>"/>
        </div>
        
        <div class="form__group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="pwd" title="Password" value="<?php echo $_SESSION["pwd"];?>"/>
        </div>
      <button class="btn" type="submit">Update profile</button>
    </form>
      </div>
      <br>
      <button class="btn" onclick="deleteme()" name="deactivate"/>Deactivate Account</button>
    <script>
        function deleteme(delid)
        {
            if (confirm("Are you sure you want to deactivate this account?"))
            {
                window.location.href='deactivate.php?del_id=';
            }
            else
            {
                window.location.href='profile.php';
            }
        }
    </script>
  </div>
</div>
    </div>
    </section>
    
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