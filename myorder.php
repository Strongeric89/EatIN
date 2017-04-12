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
    //$ID = 100;
    //get the customer id for the shoppingbasket
    $getCustomerIdQuery = "SELECT id, first_name FROM CUSTOMERS WHERE email = '$id'";
    $result9 = $mysqli->query($getCustomerIdQuery);

    while ($row = $result9->fetch_assoc())
    {
        $ID = $row['id'];
        $NAME = $row['first_name'];
    } //end while

}
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

                <li><a href="aboutUs.php">ABOUT US</a></li>

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
                    echo "  <li><a href='logout.php'><label>logout</label></a></li>";
                }
                ?>


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

            <form id=" " action="myorder.php" method="post">

              <table id="tableImage" width="500">
                <tr>
                  <th><h3>Item</h3></th>
                  <th><h3>Price</h3></th>
                  <!-- <th><h3>Quantity</h3></th> -->
                  <th><h3>Remove</h3></th>
                </tr>

                <?php
//getting the price for the basket
$totalSum = 0.00;
//hard coded until session added
$cust_id = $ID;
//from the shopping basket table
$priceQuery = "SELECT * FROM SHOPPINGBASKET WHERE customer_id = '$cust_id'";
$result = $mysqli->query($priceQuery);


while ($price = mysqli_fetch_array($result))
{
    $product_id = $price['product_id'];
    //from the products table
    $product_priceQuery = "SELECT * FROM PRODUCTS WHERE ID = '$product_id'";

    $result2 = $mysqli->query($product_priceQuery);


    while ($displayPrice = mysqli_fetch_array($result2))
    {
        $p = array(
            $displayPrice['price']
        );
        //get description of product
        $t = $displayPrice['name'];
        //single price of item
        $p1 = $displayPrice['price'];
        $sum = array_sum($p);
        //adding sum to total sum
        $totalSum = $totalSum + $sum;
?>

                <tr>
                  <td><?php echo $t;  ?></td>
                  <td>€<?php echo $p1; ?></td>
                  <!-- <td>

                      <input type="number" name="quantity" value="<?php echo $_SESSION['quantity'] ?>" min="1" max="9" step="1" size="2">
                  </td> -->

                    <?php

        if (isset($_POST['update']))
        {
            $quantity = $_POST['quantity'];
            //from the shopping basket table
            // UPDATE `shoppingbasket` SET `quantity`=3 WHERE product_id = 15

            $updateQuery = "UPDATE SHOPPINGBASKET SET QUANTITY='$quantity'";
            $result = $mysqli->query($updateQuery);
            $_SESSION['quantity'] = $quantity;
            $totalSum = $totalSum * $quantity;
        } //end if

?>

                  <td align="center"><input type="checkbox" name="remove[]"  value="<?php echo $product_id; ?>"/></td>
                </tr>

                <?php
    } //end inner while

} //end while


 ?>

                <tr >


                  <td colspan="2" align="center"><h2>Total: € <?php echo number_format($totalSum,2); ?></h2></td>

                  <td colspan="1"><button type="submit" name="update"style="width:100%; height:50px;" onclick='deletedFromBasket();'>Update Order</button></td>




                </tr>

                <tr align="center">
                  <td colspan="4"><button type="submit" name="processOrder" style="height:50px; width:100%;">Process Order</button></td>
                </tr>

              </table>

            </form>

            <?php
//if update date button is clicked

if (isset($_POST['update']))
{
    //HARD CODED
    $customer_id = $ID;

    foreach ($_POST['remove'] as $remove)
    {

        //from the shopping basket table
        $deleteQuery = "DELETE FROM SHOPPINGBASKET WHERE product_id=$remove AND customer_id= $customer_id ";
        $result = $mysqli->query($deleteQuery);

        if ($result)
        {
            echo "<script>window.open('myorder.php','_self')</script>";
        } //end if



    } //end for

} //end if

?>


<?php

if (isset($_POST['processOrder']))
{

    if ($totalSum == 0)
    {
        echo "<script>alert('Your basket is empty')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }


    else
    {
        echo "<script>window.open('processOrder.php','_self')</script>";
    } //end else

} //end if isset


?>
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
