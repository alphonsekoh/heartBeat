<?php
include 'session.php';
$fundname=$edesc= $etarget=$ecause=$errorMsg = "";
$success = true;
$ses_id=$_GET["ses_id"];
//process if form is submitted through POST
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["fundname"]))
    {
        $errorMsg .= "Please input an Event Name<br>";
        $success = false;
        
    }
     else
    {
        $fundname = sanitize_input($_POST["fundname"]);
    }
    
    if (empty($_POST["edesc"]))
    {
       $errorMsg .= "Event Description is required<br>";
       $success = false;
        
    }
    else
    {
        $edesc = sanitize_input($_POST["edesc"]);
    }
    
    $ecause = $_POST["ecause"];
    
    if (empty ($_POST["amtgoal"])){
        $errorMsg .= "Please enter an valid amount<br>";
    }
    else {
           $etarget = sanitize_input($_POST["amtgoal"]);
       }
    if (empty ($ses_id)){
        $errorMsg = "You are not logged in!";
        $success = false;
        
    }
//include "db.inc.php";
//$targetDir = "img/";
//$fileName = basename($_FILES["file"]["name"]);
//$targetFilePath = $targetDir . $fileName;
//$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
//  if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
//    // Allow certain file formats
//    $allowTypes = array('jpg','png','jpeg','gif','pdf');
//    if(in_array($fileType, $allowTypes)){
//        // Upload file to server
//        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
//            // Insert image file name into database
//            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
//            if($insert){
//                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
//            }else{
//                $statusMsg = "File upload failed, please try again.";
//            } 
//        }else{
//            $statusMsg = "Sorry, there was an error uploading your file.";
//        }
//    }else{
//        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
//    }
//}else{
//    $statusMsg = 'Please select a file to upload.';
//}
// echo $statusMsg;
    
// make a success registration page 
    
    if ($success)
    {
        
        saveMemberToDB();
        
        ?>
<html>
<head>
       <?php include 'head.inc.php';?>
</head>
<body>
        <?php include 'nav.inc.php';
        ?>
   <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center animate__animated animate__zoomIn">
                    <h2>Fundraiser Now</h2>
                    <h3><p>“If you really want to help yourself you need to love yourself.”
― Meir Ezra</p></h3>
                </div>
            </div>
        </div>
    

        <section class="event_area section_gap_top">
        <div class="container">
            <div class="main_title">
                <h2> Fundraiser Creation Success</h2>
                <p>People appreciate and never forget that helping hand especially when times are tough.</p>
            </div>
            <?php
        echo '<a href="donate.php"><button type="button" class="btn btn-success">Proceed</button></a>'; ?>
        </section>
       <?php
        include 'footer.inc.php';
        ?>
</body>
</html>
<?php
    }
    else
    {
        ?>
        <html>
<head>
       <?php include 'head.inc.php';?>
</head>
<body>
        <?php include 'nav.inc.php';
        ?>
   <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Fundraiser Now</h2>
                    <h3><p>“If you really want to help yourself you need to love yourself.”
― Meir Ezra</p></h3>
                </div>
            </div>
        </div>
    

        <section class="event_area section_gap_top">
        <div class="container">
            <div class="main_title">
                <h2> Fundraiser Creation Failed</h2>
                <p>People appreciate and never forget that helping hand especially when times are tough.</p>
            </div><?php
        echo "<p>" . $errorMsg . "</p>";
        echo '<a href="login.php"><button type="button '
        . '"class="btn btn-danger">Return to login</button></a>';
        include 'footer.inc.php';
        ?>
          </section>
       <?php
        include 'footer.inc.php';
        ?>
</body>
</html>
<?php
        
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
function saveMemberToDB()
{
    global $fundname, $edesc, $ecause, $etarget, $success;
    // Create database connection.
    $config = parse_ini_file('../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
    $config['password'], $config['dbname']);
    
    // Check connection
    if ($conn->connect_error)
    {
    $errorMsg = "Connection failed: " . $conn->connect_error;
    $success = false;
    }
    else
    {
        
    // Prepare the statement:
    $stmt = $conn->prepare("INSERT INTO heartBeat_fundraiser (fundraiser_name, fundraiser_cause,
   fundraiser_description, fundraiser_targetamount) VALUES (?, ?, ?, ?)");
    // Bind & execute the query statement:
    $stmt->bind_param("sssd", $fundname, $ecause, $edesc, $etarget);
    
//        if (!empty($_FILES['uploadfile'])) { 
//             echo "string";
//         $filename = $_FILES["uploadfile"]["name"]; 
//         $tempname = $_FILES["uploadfile"]["tmp_name"];     
//             $folder = "images/".$filename; 
//             $conn;  
//              $sql = "INSERT INTO images (file_name, uploaded_on, status) VALUES ('$filename', now(), 1  )"; 
//
//             // Execute query 
//             mysqli_query($conn, $sql);
//             $result = mysqli_query($conn, "SELECT * FROM image_table");
//        }


        if (!$stmt->execute())
        {
            echo 'execute fail';
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;

            // to debug
            echo $fundname;
            echo $ecause;
            echo $edesc;
            echo $etarget;
            echo $errorMsg;
        }
        $stmt->close();
    }
        $conn->close();
}

?>


