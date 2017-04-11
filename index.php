<?php
session_start();
include ('includes/db.php');
//session to ensure someone is signed in

if (!isset($_SESSION['id']))
{
    $id = "Guest";
    $ID = 100;
} //end if

else
{
    $id = $_SESSION['id'];
    $ID = 100;
    //get the customer id for the shoppingbasket
    $getCustomerIdQuery = "SELECT id, first_name FROM CUSTOMERS WHERE email = '$id'";
    $result9 = $mysqli->query($getCustomerIdQuery);

    if ($result9)
    {

        while ($row = $result9->fetch_assoc())
        {
            $ID = $row['id'];
            $NAME = $row['first_name'];
        }
    }
    //echo $ID;

} //end else

if (!isset($_GET['option']))
{
    echo "<script>window.open('index.php?option=TodaysSpecials','_self')</script>";
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



<?php
//create the select for main page
$option = "";
$item = "";
$startersQuery = "SELECT * FROM PRODUCTS WHERE CATAGORY = '1' ";
$soupQuery = "SELECT * FROM PRODUCTS WHERE CATAGORY = '2' ";
$seafoodQuery = "SELECT * FROM PRODUCTS WHERE CATAGORY = '3' ";
$landingQuery = "SELECT * FROM PRODUCTS WHERE CATAGORY = '4' ";
$kidsQuery = "SELECT * FROM PRODUCTS WHERE CATAGORY = '6' ";
$houseRecQuery = "SELECT * FROM PRODUCTS WHERE CATAGORY = '5' ";
$curryQuery = "SELECT * FROM PRODUCTS WHERE CATAGORY = '7' ";
$chowQuery = "SELECT * FROM PRODUCTS WHERE CATAGORY = '8' ";
$extraQuery = "SELECT * FROM PRODUCTS WHERE CATAGORY = '9' ";
$mineralsQuery = "SELECT * FROM PRODUCTS WHERE CATAGORY = '10' ";
?>

<!DOCTYPE html>
<html>

<head>
  <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <title>Home page</title>




</head>

<body>


    <!--Text or images to display in Browser window go after this opening body tag.-->

    <div id="colorSIDE">


    <div id="container">

      <div id="mainBanner">
        <div id="banner"><a id="logoLink2" href="index.php">Eat In Restaurant</a></div>
          <div id="bannerLogo"> <a id="logoLink" href="index.php">EIR</a></div>

          </div>
      <div>
            <ul id="navList">
            <li> <a href="index.php?option=TodaysSpecials">HOME</a></li>

            <li>  <a href="myorder.php">MY ORDER</a></li>

              <!-- onclick="myFunction();" -->
            <li><a href="aboutUs.php" >ABOUT US</a></li>


            <li>  <a href="editprofile.php">EDIT PROFILE</a></li>

             <form id="searchBar">
          Search for product:
          <input type="search" name="option">

<!-- this will change to log in or log out depending if there is a session -->

<?php

if (!isset($_SESSION['id']))
{
    echo "  <a href='login.php'><label>login</label></a>";
    $NAME = "Guest";
    $ID = 100;
}
else
{
    echo "  <a href='logout.php'><label>logout</label></a>";
}
?>



          </form>





            </ul>

          </div>

        <!--nav ends-->

        <div id="sidebar"
          <ul class="sideList">
            <li><u>CATAGORIES</u><br></li>


            <a href="index.php?option=starters"><li>Starters</li></a>
              <a href="index.php?option=seafood"><li>Seafood
