<?php
// session_start();
// session_destroy();
$ID = 0;
session_start();

if (!isset($_SESSION['id']))
{
    $id = "Guest";
    $ID = 100;
} //end if

?>

 <?php
//means user must be logged in

if ($ID == 100)
{
    echo "<script>alert('You must log in first')</script>";
    session_destroy();
    echo "<script>window.open('login.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <title>Logout</title>

</head>

<body id="bg1">

    <div id="container">

        <div id="mainBanner">
            <div id="banner">Eat In Restaurant</div>
            <div id="bannerLogo">EIR</div>

        </div>


        <div id="maincontentAbout">

            <div id="aboutUs2">

                  <h1>Thank you for visiting the Eat In Restraunt Page</h1>

                  <br><br>
                    <a href="index.php"><button type="button" name="button">return to homepage</button></a>
        </div>

        <?php
session_destroy();
?>

    </div>
    </div>


    </body>

</html>
