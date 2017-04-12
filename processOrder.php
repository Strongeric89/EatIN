<?php include ('includes/db.php'); ?>
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

    <title>Your order has been processed</title>

</head>

<body id="bg1">

    <div id="container">

        <div id="mainBanner">

            <div id="banner"><a id="logoLink2" href="index.php">Eat In Restaurant</a></div>
            <div id="bannerLogo"> <a id="logoLink" href="index.php">EIR</a></div>

        </div>
        <div>
            <ul id="navList">

  <!-- if the user clicks on home to return then the shopping basket must be emptied -->

                <li> <a href="index.php">HOME</a></li>

                <li><a href="aboutUs.php">ABOUT US</a></li>


                <!-- <li> <a href="editRemoveProductResults.php">ADMIN</a></li> -->


            </ul>

        </div>

        <!--nav ends-->

        <div id="maincontentAbout">

            <div id="aboutUs2">

                <b>
                      <script>
                        document.write(displayDate());
                      </script>
                    </b>

                </head>

                <body id="aboutus3">


                    <img id="processing" src="images/processing.gif" alt="processing" onLoad="setTimeout(changeImage,3000);" width="450" />
                    <h1 id="payment"> <script>

                    document.write(displayPayment());</script></h1>

                    <script>

                        setTimeout(function() {
                            document.getElementById('processing').style.display = 'none'
                        }, 3000);

                        setTimeout(function() {
                            document.getElementById('payment').style.display = 'none'
                        }, 3000);


                        setTimeout("alert('Payment Successfull');", 8000);

                    </script>

            </div>


            <?php
//query
$id = $_SESSION['id'];
$proId = 0;
$editProfile = "SELECT * FROM `customers` where email = '$id' ";
$result = $mysqli->query($editProfile);

if ($result = $mysqli->query($editProfile))
{

    while ($row = mysqli_fetch_array($result))
    {
        $proId = $row['id'];
    } //end query results
    $result->close();
} //if there is an entry
$clearBasketQuery = "DELETE FROM SHOPPINGBASKET WHERE customer_id = $proId";
$result1 = $mysqli->query($clearBasketQuery);

if ($result1)
{
}
?>






        </div>

         <h5><a href="index.php">Return to Shop</a></h5>
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
