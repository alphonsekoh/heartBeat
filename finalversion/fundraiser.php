<!DOCTYPE html> 
<?php 
include "session.php";
?>
<html lang="en">
       <?php if (!isset($_SESSION["userid"]))
   {
     
      header("location: login.php");
      
   }?>
    <head>
        <title>Fundraiser Registration</title>
        <?php
            include 'head.inc.php';
        ?>
<!--        <link rel="stylesheet" href="css/fundraise.css">-->
    </head>
    
    <body>
        <?php
            include "nav.inc.php";
        ?>
    
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Start Fundraiser</h2>
                    <p>“If you really want to help yourself you need to love yourself.” ― Meir Ezra</p>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->  
    
<!--    =============Fundraiser Registration Form==================
    <section class="event_area section_gap_top">
        <div class="container">
            <div class="main_title">
                <h2>Create Fundraiser</h2>
                <p>People appreciate and never forget that helping hand especially when times are tough.</p>
            </div>
            
    
            <div class ="form">
                
            <div class="card" >
                <div class="container" id="fund-contain">
                 <form action="process_fund.php" method="POST">
                  <div class="col-md-8 mb-3">
                        <label for="fundname">Fundraiser Event Name</label>
                        <input type="text" class="form-control" id="fundname" name="fundname" placeholder="Event Name" value="" required>
                  </div>
                    <div class="col-md-8 mb-3">
                        <div class="form-group">
                            <label for="ecause">Causes</label>
                            <select class="form-control" name="ecause" id="ecause">
                                <option value="Charity">Charity</option>
                                <option value="Terminal Illness">Terminal Illness</option>
                                <option value="Personal">Personal</option>
                            </select>
                          </div>                   
                      </div>
                
                    <div class="col-md-8">
                      <label for="tamt">Target Amount</label>
                      <label class="sr-only" for="inlineFormInputGroup">Fundraiser Amount Goal</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">$</div>
                        </div>
                          <input type="text" class="form-control" id="amtgoal" name="amtgoal" onkeypress="validate(event)" placeholder="Amount Goal">
                      </div>
                    </div>

                
                <div class='col-md-8 mb-3'>
                    <label for="edesc">Event Description:</label>
                        <textarea class='form-control'rows="6" id="edesc" 
                               name="edesc" required
                            placeholder="Event Description">
                        </textarea>
                </div>
                                
                  <div class="form-group">
                      <label for="cover-img">Cover Image upload</label>
                      <input type="file" class="form-control-file" id="cover-img" name="cover-img">
                 </div>

                <div class="form-check">
                    <input type="checkbox" name="agree" required>
                    <label>Agree to T&C.</label>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
            </div>
    
    </section>-->

        <div class = "container">
            <div class="card-body" width = 700px>
                <p> 
                    <h1>Create a Fundraiser</h1>
                    <p>People appreciate and never forget that helping hand especially when times are tough.</p>
                </p>
                    <!--================Donation Area =================-->
                <form class="row contact_form" action="process_fund.php" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="fundname" name="fundname" placeholder="Enter fundraiser name" value="" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="ecause" id="ecause">
                                <option value="Charity">Charity</option>
                                <option value="Terminal Illness">Terminal Illness</option>
                                <option value="Personal">Personal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="amtgoal" name="amtgoal" required placeholder="Enter target amount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" id="edesc" required name="edesc" rows="1" placeholder="Enter event description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
                <!--================ End Donation Area =================-->
            </div>
        </div>

     <?php
     include "footer.inc.php";
     ?>

    </body>
</html>

