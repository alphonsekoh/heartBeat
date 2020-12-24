<?php 
    include "session.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include "head.inc.php"; ?>
        <?php include "db.inc.php"; ?>
        <link rel="stylesheet" href="css/global.css">
    </head>
<body>
    <?php include "nav.inc.php"; ?>        
                    <!--================ Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Causes</h2>
                    <p>Giving is not just about making a donation. It is about making a difference.</p>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

        <div class="container py-5">
            <div class="row">
                <?php
                $f_id = $_GET['f_id'];
                $sql = "SELECT * FROM heartBeat_fundraiser WHERE fundraiser_id ='$f_id'"; //sql code to declare condition
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                //echo $resultCheck;

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?> <!--Run containers dynamically -->
                        <div class = "container">
                            <img src="images/volunteer.png" width="255px" height="200px" alt="Volunteer image">
                            <div class="card-body" width = 700px>
                                <p> 
                                    <h1> <?php echo $row['fundraiser_name']; ?> </h1>
                                    <p> <?php echo $row['fundraiser_description']; ?> </p>
                                </p>
                                    <!--================Donation Area =================-->
                                <form class="row contact_form" action="process_donation.php" method="post">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="amount" name="amount" required placeholder="Enter donation amount">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="name" name="name" required placeholder="Enter email address">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter name on card">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control" id="wellwishes" required name="wellwishes" rows="1" placeholder="Enter Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div id="card-element">
                                            <!-- a Stripe Element will be inserted here. -->
                                            </div>
                                            <!-- Used to display form errors -->
                                            <div id="card-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <input type="hidden"class="form-control" id="fundraiser_id" name="fundraiser_id" value=<?php echo $row['fundraiser_id']; ?>>
                                            <button class="genric-btn info circle arrow" type="submit">Donate<span class='lnr lnr-arrow-right'></span></button>
                                        </div>
                                    </div>
                                </form>
                                <!--================ End Donation Area =================-->
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
        <!-- The needed JS files -->
        <!-- JQUERY File -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Stripe JS -->
        <script src="https://js.stripe.com/v3/"></script>
        <!-- Your JS File -->
        <script src="js/charge.js"></script>
    </body>
</html>
