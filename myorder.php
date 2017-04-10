<?php include('includes/db.php'); ?>


<!DOCTYPE html>
<html>

<head>
    <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <title>My Order page</title>

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

                <li> <a href="myorder.php">MY ORDER</a></li>

                <li><a href="aboutUs.html">ABOUT US</a></li>


            </ul>

        </div>

        <!--nav ends-->

        <div id="maincontentAbout">

        <div id="aboutUs">

<h1>My Order</h1>
<script>
  document.write(displayDate());
</script>

        <p>
          Thank you very much for your order. Please review the following to ensure all items are correct<img src="images/logo1.jpg" alt="restraunt image" align="right" width="300" height="300" id="restImg">


          </p>

            <form id=" " action="" method="post">

              <table id="tableImage" width="500" border="1">
                <tr>
                  <th><h3>Item</h3></th>
                  <th><h3>Price</h3></th>
                  <th><h3>Quantity</h3></th>
                  <th><h3>Remove</h3></th>
                </tr>

                <?php

                //getting the price for the basket
                $totalSum = 0.00;

                //hard coded until session added
                    $cust_id = 1;

                    //from the shopping basket table
                    $priceQuery = "SELECT * FROM SHOPPINGBASKET WHERE customer_id = '$cust_id'";

                      $result = $mysqli->query($priceQuery);

                      while($price = mysqli_fetch_array($result)){
                          $product_id = $price['product_id'];

                          //from the products table
                          $product_priceQuery = "SELECT * FROM PRODUCTS WHERE ID = '$product_id'";

                          $result2 = $mysqli->query($product_priceQuery);

                          while($displayPrice = mysqli_fetch_array($result2)){

                            $p = array($displayPrice['price']);
                            //get description of product
                            $t = $displayPrice['name'];

                            //single price of item
                            $p1 = $displayPrice['price'];

                            $sum = array_sum($p);
                            //adding sum to total sum
                            $totalSum += $sum;



                 ?>

                <tr>
                  <td><?php echo $t; ?></td>
                  <td>€<?php echo $p1; ?></td>
                  <td>

                    <select class="" name="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>


                    </select></td>
                  <td><button type="button" name="button"> <span id="importantText">X</span> </button></td>
                </tr>

                <?php
              }//end inner while
                }//end while ?>

                <tr >
                  <td colspan="3" align="center"><h2>Total: € <?php echo $totalSum; ?></h2></td>
                  <td colspan="2"><button type="button" name="button">

                    Process Order
                  </button></td>

                </tr>

              </table>

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
