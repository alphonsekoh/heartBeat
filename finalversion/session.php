<?php
session_start();
if ($_SESSION["email"] == TRUE)
{
    if((time() - $_SESSION["last_time"]) > 3600) //session timeout (for inactivity)  set as 1hr
    {
        echo("<script>alert('Session Timeout')</script>");
        echo("<script>window.location = 'logout.php';</script>");
    }
    else
    {
        $_SESSION["last_time"] = time();
    }
}
?>

