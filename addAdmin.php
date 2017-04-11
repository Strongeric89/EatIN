<?php
include ('includes/db.php');
?>

 <?php
$ID = 0;
session_start();
// admin session to ensure someone is signed in

if (!isset($_SESSION['id']))
{
    $ID = 100;
} //end if

?>


 <?php

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

    <title>Add new Admin </title>

</head>

<body id="bg1">

    <div id="container">

        <div id="mainBanner">
            <div id="banner">Eat In Restaurant</div>
            <div id="bannerLogo">EIR</div>

        </div>


        <div id="maincontentAbout">

            <div id="aboutUs2">

                  <h1>Please provide Admin Details</h1>

                  <br><br>
                  <form id="form1" action="addAdmin.php" method="post">
                    <legend>New Admin Panel</legend>
                    <br>
                    <br>
                    <label for="name">Userame:</label>
                    <input id="formElements" name="username" type="email" placeholder="Enter your username" required>
                      <br>
                      <br>
                      <label for="name">Name:</label>
                      <input id="formElements" name="name" type="text" placeholder="Enter your Name" required>


                      <br>
                      <br>
                      <label for="password">Password:</label>
                      <input id="formElements" name="password" type="password" placeholder="Enter your password" required>
                      <br>
                      <br>
                      <a href="#"><input type="submit" value="Add" name="register"></a>
                  </form>




        </div>

    </div>
    </div>


    </body>

</html>


<?php
//to connect to db and create a customer entry

if (isset($_POST['register']))
{
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $insertQuery = "INSERT INTO admins (username, name, password) VALUES('$username', '$name','$password')";
    $result = $mysqli->query($insertQuery);
    echo "<script>alert('administrator added')</script>";

    if ($result)
    {
        echo "<script>alert('administrator added')</script>";
        header('Location: editRemoveProductResults.php');
        exit;
    } //end if

} //end if

?>
