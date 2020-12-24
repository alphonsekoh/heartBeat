<!doctype html>
<html lang="en">
    <head>
        <?php include "head.inc.php"; ?>
        <link rel="stylesheet" href="css/login_register.css">
        <title>heartBeat &#8212; User Login</title>
    </head>
<body>
    <?php include "nav.inc.php"; ?>
        <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Login</h2>
                    <h3><p>Welcome back! :)</p></h3>
                </div>
            </div>
        </div>
    </section>
    <section>
    <div class="container">
    <div class="login-page">
  <div class="form">

      <form class="login-form" action="process_login.php" method="post">
      <p><span class="error">*all fields are required</span></p>
        <div class="form__group">
            <label for="email">Email:</label>
            <input type="email" placeholder="Enter your email address" class="form-control" id="email" name="email" title="Email"/>
        </div>
        
        <div class="form__group">
            <label for="pwd">Password:</label>
            <input type="password" placeholder="Enter your password" class="form-control" id="pwd" name="pwd" title="Password"/>
        </div>
      <button class="btn" type="submit">Login</button>
      <p class="message"><h5>Do not have an account?<br> <a href="register.php">Sign up here!</a></h5></p>
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
