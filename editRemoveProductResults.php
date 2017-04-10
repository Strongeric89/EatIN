<?php include('includes/db.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>admin - edit/ delete product page</title>
  </head>
  <body >

    <div   <div id="container2">

          <form action="editProduct.php" method="post">

            <table id="tableImage" align="center" width="900" border="2">

            </tr>

            <tr align="center" height="200">
                    <td colspan="8" align="right"><a id="addProduct" href="insertProduct.php"><h1>Add Product</h1></a></td>
            </tr>




              <tr align="center" height="200">

                      <td colspan="8" align="right"><h1>Edit/Remove Item</h1></td>

              </tr>

              <tr>
                    <td><b>Product Id</b></td>
                    <td><b>Product Name</b></td>
                    <td><b>Product Price</b></td>
                    <td><b>Product Catagory</b></td>
                    <td><b>Product Image</b></td>
                    <td><b>Edit</b></td>
                    <td><b>Remove</b></td>

              </tr>


              <tr>
                <?php
                    //display all products
                    $products = "SELECT * FROM `products` ";
                    $result = $mysqli->query($products);

                    while($row = $result->fetch_assoc()){
                      $id = $row['id'];
                      $name = $row['name'];
                      $price = $row['price'];
                      $catagory = $row['catagory'];
                      $image = $row['image'];

                      $output = '<tr>';
                      $output .= '<td> '. $row['id'] . '</td>';
                      $output .= '<td>' . $name . '</td>';
                      $output .= '<td>' . $price  . '</td>';
                      $output .= '<td>' . $catagory . '</td>';
                      $output .= '<td>' . $image . '</td>' ;

                      $output .= '<td><a id="button1" href="editProduct.php?id='.$row['id'].'"><b>EDIT</b></a></td>';
                      $output .= '<td><a id="button1" href="removeProduct.php?id='.$row['id'].'"><b>REMOVE</b></a></td>';
                      $output .= '</tr>';

                      echo $output;


                    }//end query results

                  ?>

              <tr align="center" height="200">
                      <td colspan="8" align="right"><a id="addProduct" href="index.php"><h1>Main Page</h1></a></td>
              </tr>

            </table>

          </form>

            </div>

  </body>
</html>
