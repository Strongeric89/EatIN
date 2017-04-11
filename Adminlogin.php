<?php
session_start();
include('includes/db.php');

 ?>


<!DOCTYPE html>
<html>

<head>
    <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <title>Admin Login </title>

</head>

<body id="bg1">

    <div id="container">

        <div id="mainBanner">
            <div id="banner">Eat In Restaurant (ADMIN)</div>
            <div id="bannerLogo">EIR</div>

        </div>


        <div id="maincontentAbout">

            <div id="aboutUs2">

                  <h1>Admin Login</h1>


                  <br><br>
                  <form id="loginForm" action="Adminlogin.php" method="post" >

                    <b>Username: </b><input type="email" name="username" id="username" value="" required>
                    <br><br>
                    <b>Password: </b><input type="password" name="password" id="passord" value="" required>
                    <br><br>


                    <br><br>

                      <br>
                      <br>
                    <input type="submit" name="login" value="Login">
                  </form>




                  <?php

                  if(isset($_POST['login'])){

                    //checking for correct credentials
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                      //if an admin is logging in -must contain admin in the email or password
                      $selectQueryAdmin = "SELECT * FROM admins WHERE username = '$username' AND password = '$password' ";


                      $result = $mysqli->query($selectQueryAdmin);

                      $check1 = mysqli_num_rows($result);

                    if($check1==0){
                      echo "<script>alert('Username or password does not exist. Try Again');</script>";
                    }//end if
                    #
                    else{

                      //get the id to begin the session.
                      $selectQuery2 = "SELECT id FROM admins WHERE username = '$username' AND password = '$password' ";


                      $result2 = $mysqli->query($selectQuery2);

                      if($result2){
                        //using email as a session id
                        $_SESSION['id'] = $username;


                        echo "<script>alert('Authentication Successfull. Welcome Admin');</script>";

                        header('Location: editRemoveProductResults.php');

                      }//end if



                    }//end else

                  }//end if




                   ?>




        </div>

    </div>
    </div>


    </body>

</html>
