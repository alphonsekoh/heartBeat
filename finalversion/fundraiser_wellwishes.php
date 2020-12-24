<?php
include "session.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <title>HeartBeat &#8212; Well Wishes</title>
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
                    <div class="banner_content text-center">
                        <h2>Well Wishes</h2>
                        <p>Hear what our donors' have to say.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Home Banner Area =================-->

        <div class="container" id="well_wishes_f_id_container">

            <div class="row">
                <?php
                $f_id = $_GET['f_id'];
                $sql = "select wellwishes, fname, lname from heartBeat_donations, heartBeat_users where 
heartBeat_donations.fundraiser_id='$f_id' AND heartBeat_donations.user_id = heartBeat_users.user_id;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                //echo $resultCheck;

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?> <!--Run containers dynamically -->


                        <div class = "column well_wishes_board_col">
                            <div class = "note">

                                <h3> <?php echo $row['wellwishes']; ?> </h3>
                                <p class="byname"> <?php echo "&#8212; " . $row['fname'] . " " . $row['lname']; ?> </p>

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
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
