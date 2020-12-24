<?php include "session.php"; ?>

<?php
$wellwishes = $fname = $lname = $fundraiser_name = $errorMsg = "";
$success = true;

function get_wellwishes() {
    global $wellwishes, $fname, $lname, $fundraiser_name, $errorMsg, $success;
    include "db.inc.php";

    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {

        $stmt = $conn->prepare("SELECT wellwishes, fname, lname, fundraiser_name
FROM heartBeat.heartBeat_donations, heartBeat.heartBeat_users, heartBeat.heartBeat_fundraiser
WHERE heartBeat_donations.user_id = heartBeat_users.user_id and heartBeat_donations.fundraiser_id = heartBeat_fundraiser.fundraiser_id LIMIT 20;");
        $stmt->bind_param("ssss", $wellwishes, $fname, $lname, $fundraiser_name);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $wellwishes = $row["wellwishes"];
            $fname = $row["fname"];
            $lname = $row["lname"];
            $fundraiser_name = $row["fundraiser_name"];
        } else {
            $errorMsg = "data no found";
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
    $get_the_result = $result;
    return $get_the_result;
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>HeartBeat &#8212; Well Wishes</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script defer src="js/wellwishes.js"></script>

        <?php include "head.inc.php"; ?>
    </head>
    <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
       <?php include "nav.inc.php";?>
    </header>
    <!--================ End Header Menu Area =================-->
        <!--================ Start Home Banner Area =================-->
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
       <!--================ Start Well Wishes Area =================-->
       <?php
        if ($success) {

?>
            <section id="well_wishes_board">
            <div class="container">
                <div class="well_wishes_board_row">
                    <?php
                    $results = get_wellwishes();
                    foreach ($results as $row) :
                        ?>
                        <div class = "column well_wishes_board_col">
                            <div class = "note">
                                <div class = "tape">
                                </div>
                                <h3><?= $row['wellwishes'] ?></h3>
                                <p>&#8212; <?= $row['fname'] ?> <?= $row['lname'] ?></p>
                                <p>Donated to <?= $row['fundraiser_name'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
       <?php       
        }
        else {
                echo "<h2>Sorry! Please return another day!</h2>";
            }
            ?>
     <!--================ End Well Wishes Area =================-->

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