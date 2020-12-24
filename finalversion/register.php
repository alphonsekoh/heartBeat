<!doctype html>
<html lang="en">
    <head>
        <?php include "head.inc.php"; ?>
        <link rel="stylesheet" href="css/login_register.css">
        <title>heartBeat &#8212; User Registration</title>
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
                    <h3><p>Sign up and be part of this big family! :)</p></h3>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <section>
    <div class ="container">
    <div class="login-page">
  <div class="form">

    <form class="login-form" action="process_register.php" method="post">
    <p><span class="error">*all fields are required</span></p>
      <div class="form__group">
            <label for="fname">First Name:</label>
            <input class = "form-control" type="text" id="fname" name="fname"
                    placeholder="Enter your first name" title="First Name">
        </div>
        <div class="form__group">
            <label for="lname">Last Name:</label>
            <input class = "form-control" type="text" id="lname" name="lname"
                    placeholder="Enter your last name" title="Last Name">
        </div>
        <div class="form__group">
            <label for="email">Email:</label>
            <input type="email" placeholder="Enter your email address" class="form-control" id="email" name="email" title="Email"/>
        </div>
        
        <div class="form__group">
            <label for="pwd">Password:</label>
            <input type="password" placeholder="Enter your password" class="form-control" id="pwd" name="pwd" title="Password"/>
        </div>
        <div class="form__group">
            <label for="pwd_confirm">Confirm Password:</label>
            <input class="form-control" type="password" id="pwd_confirm" name="pwd_confirm"
            placeholder="Confirm password" title="Confirm Password">
        </div>
      <button class="btn" type="submit">Register</button>
      <p class="message"><h5>Have an account?<br> <a href="login.php">Sign in here!</a></h5></p>
    </form>
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