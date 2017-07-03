<?php
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

    <title>About Us page</title>

</head>

<body>

    <div id="container">

        <div id="mainBanner">
          <div id="banner"><a id="logoLink2" href="index.php">Eat In Restaurant</a></div>
            <div id="bannerLogo"> <a id="logoLink" href="index.php">EIR</a></div>

        </div>
        <div>
            <ul id="navList">
                <li> <a href="index.php">HOME</a></li>

                <li><a href="aboutUs.php" >ABOUT US</a></li>

                 <li>  <a href="editprofile.php">EDIT PROFILE</a></li>

                 <?php

                 if (!isset($_SESSION['id']))
                 {
                     echo "  <li><a href='login.php'><label>login</label></a></li>";
                     $NAME = "Guest";
                     $ID = 100;
                 }
                 else
                 {
                     echo "  <li><a href='logout.php' align='right'><label>logout</label></a></li>";
                 }
                 ?>

            </ul>

        </div>

        <!--nav ends-->

        <div id="maincontentAbout">

        <div id="aboutUs">
          <h1>About Eat In Restraunt</h1>


                      <b>
                      <script>
                        document.write(displayDate());
                      </script>
                    </b>

        <p>
        Eat in Restraunt is an authentic Chinese Food Restraunt. Its deadly food! We are located in Dublin, and the grub is savage!<img src="images/eatin.jpg" alt="restraunt image" align="right" width="300" height="300" id="restImg">


          </p>

          <p>Remember   to check out our special offers and to buy all of our deadly food. cos its just soooooo good!.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          </div>

          <hr>
            <div id ="directions">
            <div id="map1">
                <h4>How to find us</h4>


                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2382.332788575971!2d-6.269521884760754!3d53.33729878309082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670c2089d84a1d:0x6e1d03e3d62489ae!2sDIT-Kevin Street!5e0!3m2!1sen!2sie!4v1479836076868"
                    frameborder="0" style="border:0" allowfullscreen="">


                    </iframe>
                    </div>

                <div id="map2">


                    <p align="right"><b>Address:</b>
                            19 Riversdale Avenue,

                            Dublin 19

                            <p><b>Phone:</b> 018415900</p>

                            <p><b>Email:</b> Eatin@gmail.com</p>
                    </p>

                    </div>

            </div>

            <hr>

            <div id="contact-form">
                <h4>Contact us</h4>
                <form id="form1" action="email.php" method="post">
                  <legend>Eat In Feedback Form</legend>
                  <br>
                  <br>
                  <label for="name">Name:</label>
                  <input id="formElements" name="name" type="text" placeholder="Enter your Name" required>
                    <br>
                    <br>
                    <label for="email">Email:</label>
                    <input id="formElements" name= "email" type="email" placeholder="Enter your Email" required>
                    <br>
                    <br>
                    <label for="telephone">Phone:</label>
                    <input id="formElements" name="phone" type="number" placeholder="Enter your number" required>
                    <br>
                    <br>

                    <label for="date">Date of your Meal:</label>
                <input type="date" name="date" value="today">
                <br>
                <br>
                    <label for="message">Message:</label>
                    <textarea id="formElements" name="message" placeholder="Message"required></textarea>
                    <br>
                    <br>


                    <a href="email.php"><input type="submit" value="submit" name="submit"></a>
                </form>
            </div>

        </div>
        <!--maincontent ends-->
        <footer id="footer">

            <div id="footerText">
              <b>&copy 2017 Eat In Chinese Restaurant | by Eric Strong</b>
          </div>

          <div id="socialMediaIcons">
              <a href="#"><img src="images/facebook-opt.png" alt="facebook logo" width="30px"></a>
              <a href="#"><img src="images/twitter-opt.png" alt="twitterlogo" width="30px"></a>
              <a href="#"><img src="images/linked-in-opt.png" alt="linkedin logo" width="30px"></a>
              <a href="#"><img src="images/justeat-opt.png" alt="just eatlogo" width="30px"></a>

          </div>

      </footer>
      <!--footer ends-->
  </div>
  </div>

  </body>

</html>
