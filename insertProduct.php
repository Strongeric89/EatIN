<?php include('includes/db.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>admin - insert product page</title>


  </head>
  <body >

    <div   <div id="container2">


          <form action="insertProduct.php" method="post">

            <table align="center" width="900" border="2" bgcolor="white">


              <tr align="center" height="200">
                      <td colspan="8" align="right"><h1>Insert New Item</h1></td>
              </tr>

              <tr>
                    <td><b>Product Name</b></td>
                    <td><input type="text" name="productName" placeholder="eg...Noodles" required></td>

              </tr>

              <tr>
                    <td><b>Product Price</b></td>
                    <td><input type="text" name="productPrice" placeholder="eg...5.50"required></td>

              </tr>

              <tr>
                    <td><b>Product Catagory</b></td>
                    <td>
                          <select name="productCatagory">
                            <option value="">Select Catagory</option>
                            <?php
                                //display all catagories
                                $catagories = "SELECT * FROM `products_catagory` ";
                                $result = $mysqli->query($catagories);

                                while($row = mysqli_fetch_array($result)){
                                  $id = $row['id'];
                                  $name = $row['name'];

                                  echo "<option value='$id'>$name</option>";

                                }//end query results


                              ?>

                            </select>



                    </td>

              </tr>

              <tr>
                    <td><b>Product Image</b></td>
                    <td><input type="text" name="image" placeholder="images/noodles.jpg"></td>

              </tr>

              <tr align="center">

                    <td colspan="8" ><input type="submit" name="insertProduct" value="insert new Item" ></td>

              </tr>

            </table>

          </form>

            </div>

  </body>
</html>

<?php
//inserting data into the database
if(isset($_POST['insertProduct'])){
    $product_name = $_POST['productName'];
    $product_price = $_POST['productPrice'];
    $product_catagory = $_POST['productCatagory'];
    $product_image = $_POST['image'];
    $pos= "NULL";



    $insert = "INSERT INTO products (id,name,price,catagory,image) VALUES('$pos','$product_name', '$product_price', '$id', '$product_image')";



      $result2 = $mysqli->query($insert);

      if($result2){
        echo "<script>alert('item added')</script>";
        //refresh the page
        echo "<script>window.open('insertProduct.php','_self')</script>";
      }//end check


}//end if
 ?>
