<?php include "session.php"; ?>
<!doctype html>
<html lang="en">
    <head>
        <title>heartBeat &#8212; Home</title>
        <?php include "head.inc.php";?>
    </head>
<body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
       <?php include "nav.inc.php";?>
    </header>
    <!--================ End Header Menu Area =================-->

	<!--================ Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="banner_content">
					<p class="upper_text">Humanity</p>
					<h2>powered by a heartbeat at a time</h2>
					<p>
						heartBeat hopes to make giving simple, fun and meaningful for you. The possibilities are endless!
					</p>
                                        <a class="primary_btn mr-20" href="donate.php">Donate Now</a>
                                        <a class="primary_btn yellow_btn text-white" href="fundraiser.php">Fundraise Now</a>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->
        
	<!--================ Start Causes Area =================-->
	<section class="causes_area">
		<div class="container">
			<div class="main_title">
				<h2>Contribute Today</h2>
				<p>Be the change you want to see in the world.</p>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
                                            <h4><a href="donate.php">Donate</a></h4>
						<img src="img/causes/c1.png" alt="">
						<p>
							We make a living by what we get. We make a life by what we give.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
                                            <h4><a href="fundraiser.php">Fundraise</a></h4>
						<img src="img/causes/c2.png" alt="">
						<p>
							They always say time changes things, but you actually have to change them yourself.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single_causes">
                                            <h4><a href="volunteer.php">Volunteer</a></h4>
						<img src="img/causes/c3.png" alt="">
						<p>
							The more one helps others to succeed, the more they succeed.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Causes Area =================-->
        

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