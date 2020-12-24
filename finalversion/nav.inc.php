<?php

?>
<!--================ Start Header Menu Area =================-->
<header class="header_area">
        <div class="main_menu">
                <div class="container">
                        <nav class="navbar navbar-expand-lg navbar-light">
                                <div class="container">
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <a class="navbar-brand logo_h" href="index.php"><img src="img/logo2.png" alt="logo"></a>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                        </button>
                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                                                <ul class="nav navbar-nav menu_nav ml-auto">
                                                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li> 
                                                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li> 
                                                        <li class="nav-item"><a class="nav-link" href="donate.php">Donate</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="volunteer.php">Volunteer</a></li> 
                                                        <li class="nav-item"><a class="nav-link" href="wellwishes.php">Well Wishes</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                                                        <?php if ($_SESSION['email'] == TRUE) {?>
                                                        <li class="nav-item submenu dropdown">
                                                                <a href="display_registered_events.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                                                                <ul class="dropdown-menu">
                                                                        <li class="nav-item"><a class="nav-link" href="display_registered_events.php"profile.php">Your Upcoming Events</a>
                                                                        <li class="nav-item"><a class="nav-link" href="profile.php">Account Details</a>
                                                                </ul>
                                                        </li> 
                                                        <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                                                        <?php } else { ?>
                                                        <li class="nav-item"><a class="nav-link" href="register.php">Sign Up</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>
                                                        <?php } ?>
                                                </ul>
                                        </div> 
                                </div>
                        </nav>
                </div>
        </div>
</header>
<!--================ End Header Menu Area =================-->

