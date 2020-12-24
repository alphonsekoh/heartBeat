<?php include "session.php"; ?>
<?php include "db.inc.php"; ?>
<?php  
    if (!isset($_SESSION["userid"]))
   {
      header("location: login.php");
   }
?>
<!doctype html>
<html lang="en">
    <head>
        <?php include "head.inc.php"; ?>
    </head>
    <body>
        <?php include "nav.inc.php"; ?>
        <!--================ Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Volunteer Today</h2>
                        <p>HeartBeat has curated the following volunteering opportunities for you.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Home Banner Area =================-->

        <!--================ Start Recent Event Area =================-->

        <section class="event_area section_gap_top">
            <div class="container">
                <div class="main_title">
                    <h2>Creating events</h2>
                    <p>Lead a change to better the lives of everyone. </p>
                </div>
                <div class="container">
                    <form class="row contact_form" action="process_event_creation.php" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="form-row control_space">
                                <div class="form group col-md-4">
                                    <label for="event_name" class="label_tag">Event Name:</label>
                                    <input class ="form-control form_tag" type="text" id="event_name" 
                                           required name="event_name" maxlength="45"
                                           placeholder="Enter event name">
                                </div>
                                <div class="form group col-md-4">
                                    <label for="event_cause" class="label_tag">Event cause:</label>             
                                    <select class ="nice-select wide form-control nice_form_border" id="event_cause"
                                            name="event_cause">  
                                        <option value="Disability">Disability</option>
                                        <option value="Education">Education</option>
                                        <option value="Elderly">Elderly</option>
                                        <option value="Environment">Environment</option>    
                                    </select>
                                </div>
                                <div class="form group col-md-4">
                                    <label for="event_organization" class="label_tag">Organization Name:</label>
                                    <input class ="form-control form_tag" type="text" id="event_organization" 
                                           required name="event_organization" maxlength="45"
                                           placeholder="Enter organization name">
                                </div>
                            </div>
                            <div class="form-row control_space">
                                <label for="event_description" class="label_tag">What is your event about?</label>
                                <textarea class="nice-select wide form-control nice_form_border" type="text" id="event_description" 
                                          required name="event_description" rows="3"
                                          maxlength="300">
                                </textarea>
                                <small id ="passwordHelpBlock" c;ass="form-text text muted">
                                    Your description must not exceed 500 characters and must not contain any special characters, or emoji.
                                </small>
                            </div>
                        </div>

                        <div class="container">
                            <div class="form-row control_space">
                                <div class="form-group col-md-6">
                                    <label for="event_contactfname" class="label_tag">First Name:</label>             
                                    <input class ="form-control form_tag" type="text" id="event_contactfname" 
                                           name="event_contactfname"  maxlength="20"                 
                                           placeholder="Enter first name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="event_contactlname" class="label_tag">Last Name:</label> 
                                    <input class ="form-control form_tag" type="text" id="event_contactlname" 
                                           required name="event_contactlname" maxlength="20"                 
                                           placeholder="Enter last name">
                                </div>
                            </div>
                            <div class="form-row control_space">
                                <div class="form-group col-md-6">
                                    <label for="event_contactemail" class="label_tag">Contact Email:</label>             
                                    <input class ="form-control form_tag" type="email" id="event_contactemail" 
                                           required name="event_contactemail" maxlength="50"                 
                                           placeholder="Enter contact email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="event_contactnumber" class="label_tag">Contact Number:</label>             
                                    <input class ="form-control form_tag" type="number" id="event_contactnumber" 
                                           required name="event_contactnumber" max="9999999999"               
                                           placeholder="Enter contact number">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="form-row control_space">

                                <div class="form-group col-md-6">
                                    <label for="event_location" class="label_tag">Location:</label>
                                    <input class="form-control form_tag" type="text" id="event_location" 
                                           required name="event_location" placeholder="E.g Telok Blangah">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="event_address" class="label_tag">Address:</label>
                                    <input class="form-control form_tag" type="text"  id="event_address" 
                                           required name="event_address" placeholder="1234 Main St">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="form-row control_space">
                                <div class="form-group col-md-6">
                                    <label for="event_startdate" class="col-form-label label_tag">Start Date:</label>
                                    <input class="form-control form_tag" type="date" id="event_startdate"
                                           required name="event_startdate" value="mm/dd/yyyy"
                                           max ="2022-12-31" min="2020-01-31"> 
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="event_enddate" class="col-form-label label_tag">End Date:</label>
                                    <input class="form-control form_tag" type="date" id="event_enddate"
                                           required name="event_enddate" value="mm/dd/yyyy"
                                           max ="2022-12-31" min="2020-01-31"> 
                                </div>
                            </div>
                            <div class="form-row control_space">
                                <div class="form-group col-md-6">
                                    <label for="event_targetvolunteers" class="label_tag">Target Volunteers:</label>             
                                    <input class ="form-control form_tag" type="number" id="event_targetvolunteers" 
                                           required name="event_targetvolunteers" min="1" max="8"               
                                           placeholder="Enter number of volunteers">
                                </div>
                            </div>
                            <div class="form-row control_space">
                                <div class="form-group col">
                                    <button class="btn btn-outline-dark btn_submit_event" name="event_submit" type="event_submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--================ End Recent Event Area =================-->

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

