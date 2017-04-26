<?php include ('includes/db.php'); ?>
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

if ($ID == 100  or $_SESSION['id'] !=1)
{
    echo "<script>alert('You do not have sufficient Privileges. Admins Only. You have been logged out!')</script>";
    session_destroy();
    echo "<script>window.open('login.php','_self')</script>";
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>admin - Remove product page</title>

  </head>
  <body >

      <div id="deleteBox">
        <div id="container2" >
                <h1> Are you sure you want to remove this product?</h1>
                <?php
                $id = $_GET['id'];
                $deleteQuery1 = "SELECT * FROM PRODUCTS WHERE id = $id ";
                $result1 = $mysqli->query($deleteQuery1);

                while ($row = $result1->fetch_assoc())
                {
                    $product_id = $row['id'];
                    $product_name = $row['name'];
                    $product_price = $row['price'];
                    $product_catagory = $row['catagory'];
                    $product_image = $row['image'];
                    //this is the product boxes to be displayed
                    echo "
                        <div id='product_box2'>
                          <h2>ID : $product_id</h2>
                          <h2>$product_name</h2>
                          <img src='$product_image' width='120' height='120' border='3' alt='food image'/>
                          <h2><b>€ $product_price</b></h2>

                          <form action='removeProduct.php?id=$product_id' method='post'>
                              <a href='#'><input id='box' type='submit' value='yes' name='yesRemove' onclick='itemDeleted();' ></a>

                              <a href='editRemoveProductResults.php'><input id='box' type='submit' value='no' name='noRemove' onclick='notDeleted();'></a>

                          </form>
                        </div>
                      ";

                      if (isset($_POST['yesRemove']))
                      {
                          $delete2 = "DELETE FROM `products` WHERE name like '%$product_name%'";
                          $mysqli->query($delete2);
                          header('Location: editRemoveProductResults.php');
                          exit;
                      } //end if

                } //end while loop
                ?>

                <?php

                if (isset($_POST['noRemove']))
                {
                    header('Location: editRemoveProductResults.php');
                }
                ?>

          </div>
        </div>
  </body>
</html>
