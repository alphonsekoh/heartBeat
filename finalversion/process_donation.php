<?php include "session.php"; ?>

<?php
// David's script
$date = $amount = $wellwishes = $user_id = $fundraiser_id = "";
$success = true;

//Validate User ID
if (empty($_SESSION['userid'])) 
{
    $errorMsg .= "Login is required. <br>";
    $success = false;
}
else 
{
    $user_id = $_SESSION['userid'];
}

$fundraiser_id = $_POST['fundraiser_id'];

//process if form is submitted through POST
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty ($_POST["amount"]))
    {
        $errorMsg .= "Please enter an valid donation amount.<br>";
    }
    else 
    {
        $amount = sanitize_input($_POST["amount"]);
    }
       
    if (empty($_POST["wellwishes"]))
    {
        $errorMsg .= "Please provide well wishes to (name of fundraiser).<br>";
        $success = false;
        
    }
     else
    {
        $wellwishes = sanitize_input($_POST["wellwishes"]);
    }
      
// make a success registration page 
    if ($success)
    {
        saveDonationToDB();
    }
}

//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function saveDonationToDB()
{
    global $date, $amount, $wellwishes, $user_id, $fundraiser_id;
    // Create database connection.
    $config = parse_ini_file('../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
    $config['password'], $config['dbname']);
    // Check connection
    if ($conn->connect_error)
    {
        echo "conn direct connection error";
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    }
    else
    {
    // Prepare the statement:
    $date = "11/11/2020";
    $stmt = $conn->prepare("INSERT INTO heartBeat_donations (date, amount,
    wellwishes, user_id, fundraiser_id) VALUES (?, ?, ?, ?, ?)");
    // Bind & execute the query statement:
    $stmt->bind_param("sdsii", $date, $amount, $wellwishes, $user_id, $fundraiser_id);
    
    if (!$stmt->execute())
    {
        $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        $success = false;
        echo "else and FALED";
        echo $date;
        echo $amount;
        echo $wellwishes;
        echo $user_id;
        echo $fundraiser_id;
        echo $errorMsg;
    }
        $stmt->close();
    }
        $conn->close();
}

?>

<html lang="en">
    <head>
        <?php include "head.inc.php"; ?>
        <link rel="stylesheet" href="css/login_register.css">
    </head>
<body>
    <?php include "nav.inc.php"; ?>
        <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Donation</h2>
                    <p>Giving is not just about making a donation. It is about making a difference.</p>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <div class="login-page">
        <div class="form">
        <?php
            if ($success)
            {
                $fname = $_SESSION['fname'];
                $lname = $_SESSION['lname'];
                echo "<h1>Donation Successful!</h1>";
                echo "<h4>Thank you for donating, " . $fname . " " . $lname .".</h4>";
                echo "<p>Take a look at the available volunteering events.</p>";
                echo '<a href="volunteer.php"><button type="button" class="btn btn-success">Take me there</button></a>';
            }
            else
            {
                if (empty($_SESSION['userid'])) 
                {
                    echo '<h1>Oops!</h1>';
                    echo "<h4>The following input errors were detected:</h4>";
                    echo "<p>" . $errorMsg . "</p>";
                    echo '<a href="login.php"><button type="button '
                    . '"class="btn btn-danger">Log in here</button></a>';
                }
                else 
                {
                    echo '<h1>Oops!</h1>';
                    echo "<h4>The following input errors were detected:</h4>";
                    echo "<p>" . $errorMsg . "</p>";
                    echo '<a href="donate.php"><button type="button '
                    . '"class="btn btn-danger">Return to featured causes</button></a>';
                }
            }
            ?>
        </div>
    </div>
    <?php include "footer.inc.php"; ?>
</body>
</html>