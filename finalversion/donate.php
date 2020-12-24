<?php include "session.php";?>

<!doctype html>
<html lang="en">
    <head>
        <?php include "head.inc.php"; ?>
        <?php include "db.inc.php"; ?>
    </head>
<body>
    <?php include "nav.inc.php"; ?>

        <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center animate__animated animate__zoomIn">
                    <h2>Causes</h2>
                    <p>Giving is not just about making a donation. It is about making a difference.</p>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->
    
	<!--================ Start Features Cause section =================-->
	<section class="features_causes section_gap_top">
        <div class="container">
            <div class="main_title">
                <h2>Featured causes</h2>
                <p>Great things are done by a series of small things brought together. </p>
            </div>

            <div class="row">
                <?php
              $sql = "SELECT * FROM heartBeat_fundraiser"; //sql code to declare condition
               $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                $sql1="update heartBeat_fundraiser set heartBeat_fundraiser.fundraiser_totalamount =( select sum(heartBeat_donations.amount) from heartBeat_donations where heartBeat_fundraiser.fundraiser_id = heartBeat_donations.fundraiser_id)";
                mysqli_query($conn, $sql1);
                $sql2="update heartBeat_fundraiser set heartBeat_fundraiser.fundraiser_donor= ( select sum(heartBeat_donations.fundraiser_id) div fundraiser_id from heartBeat_donations where heartBeat_fundraiser.fundraiser_id = heartBeat_donations.fundraiser_id)";
                 mysqli_query($conn, $sql2);
 
               if ($resultCheck > 0) {
                   while ($row = mysqli_fetch_assoc($result)) {?>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <figure>
                                <img class="card-img-top img-fluid" src="img/features/fc1.jpg" alt="Card image cap">
                            </figure>
                            <div class="card_inner_body">
                                <h4 class="card-title truncate"><?php echo $row['fundraiser_name']; ?></h4>
                                <p class="card-text truncate">
                                    <?php echo $row['fundraiser_description']; ?>
                                </p>
                                <div class="d-flex justify-content-between raised_goal">
                                    <p>$<?php if($row['fundraiser_totalamount'] != null){
                                        echo $row['fundraiser_totalamount'];}
                                        else {
                                            echo "0.00";
                                        }?></p>
                                    <p><span>$<?php echo $row['fundraiser_targetamount']; ?></span></p>
                                </div>
                                <div class="d-flex justify-content-between raised_goal">
                                    <a href="donation_display.php?f_id=<?php echo $row['fundraiser_id'];?>" class="genric-btn success circle arrow">See more</a>
                                </div>
                                <div class="d-flex justify-content-between donation align-items-center">
                                    <a href="fundraiser_wellwishes.php?f_id=<?php echo $row['fundraiser_id'];?>" class="genric-btn info circle arrow">See Well Wishes</a>
                                    <p><span class="lnr lnr-heart"></span> <?php if($row['fundraiser_donor']!=null){
                                                                                    echo $row['fundraiser_donor'];}
                                    else {
                                        echo "0";
                                         }?> Donors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo "No data.";
                }
                ?>
            </div>
        </div>
    </section>
    <!--================ End Features Cause section =================-->
    
   	<!--================ Start CTA Area =================-->
	<div class="cta-area section_gap overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h1>Start your own fundraiser</h1>
                    <p>
                        "Alone we can do so little; together we can do so much.” Helen Keller
                    </p>
                    <a href="fundraiser.php" class="primary_btn yellow_btn rounded">Fundraise with us</a>
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

