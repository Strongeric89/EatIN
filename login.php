<?php
session_start();
include ('includes/db.php');
?>
<!DOCTYPE html>
<html>

<head>
    <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="css/style2.css" type="text/css">

    <title>Login </title>

</head>

<body id="bg1" >

    <div id="container">

        <!-- <div id="mainBanner">
            <div id="banner">Eat In Restaurant</div>
            <div id="bannerLogo">EIR</div>

        </div> -->


        <div id="maincontentAbout">

            <div id="aboutUs2">

                  <h1>Welcome to the Eat In Restraunt Page. Please Sign in</h1>


                  <br><br>
                  <form id="loginForm" action="login.php" method="post">

                    <b>Email:  &nbsp   &nbsp   &nbsp   &nbsp</b><input type="email" name="email" id="username" value="" required>
                 <br><br>
                 <b>Password:  </b><input type="password" name="password" id="passord" value="" required>
                 <br><br>

                   <!-- <b>Remember me:</b><input type="checkbox" name="remember" value="1"> -->

                 <br><br>
                 <a href="signup.php" style="color:red;">Sign up</a>
                   <br><br>
                     <a href="Adminlogin.php" style="color:red;">Admin Area (for test purposes)</a>
                   <br>
                   <br>
                 <input type="submit" name="login" value="Login">
               </form>

               <?php
               if(isset($_POST['login'])){
                 //checking for correct credentials
                 $password = $_POST['password'];
                 $email = $_POST['email'];
                     //standard user
                 $selectQuery = "SELECT * FROM CUSTOMERS WHERE email = '$email' AND password = '$password' ";
                 $result = $mysqli->query($selectQuery);
                 $check1 = mysqli_num_rows($result);
                 if($check1==0){
                   echo "<script>alert('Email or password does not exist. Try Again');</script>";
                 }//end if
                 else{
                   //get the id to begin the session.
                   $selectQuery2 = "SELECT id FROM CUSTOMERS WHERE email = '$email' AND password = '$password' ";
                   $result2 = $mysqli->query($selectQuery2);
                   if($result2){
                     //using email as a session id
                     $_SESSION['id'] = $email;
                     echo "<script>alert('Authentication Successfull. Welcome!');</script>";
                     header('Location: index.php');
                   }
                 }//end else
               }//end if
                ?>


     </div>

 </div>
 </div>




 </body>

</html>
