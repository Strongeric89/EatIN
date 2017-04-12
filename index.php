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
            <a href="index.php?option=seafood"><li>Seafood &nbsp  &nbsp  &nbsp   &nbsp  </li></a>
             <a href="index.php?option=soups"><li>Soups</li></a>
             <a href="index.php?option=specials"><li>Special Value Meals</li></a>
             <a href="index.php?option=kids"><li>Kid's Meals</li></a>
             <a href=index.php?option=house><li>House Recommended</li></a>
             <a href="index.php?option=curry"><li>Curry Dishes</li></a>
           <a href="index.php?option=chow">  <li>Chow Mein Dishes</li></a>
           <a href="index.php?option=extra">  <li>Extra Portions</li></a>
           <a href="index.php?option=minerals">  <li>Minerals</li></a>


         </ul>
       </div>
       <!--sidebar ends-->
       <div id="maincontent">

         <div id="myorder">
<br>
         <b>Welcome <span id="importantText"><?php echo $NAME;  ?></span></b>
           <b>
             &nbsp
             &nbsp
           <script>
             document.write(displayDate());
           </script>
         </b>

         <br>



         <h5 >Number of Items: <span id="importantText"><?php calculateBasket($ID); ?></span></h5>

           <?php shoppingbasket($ID);?>

           <h1>Your Shopping Cart Total: <span id="importantText">€<?php calculatePrice($ID);?></span></h1>



         </div>

         <article id="mainArticle">
             <section id="section1">
               <!--This is where all of the php wil go for the body of the website-->


                 <div id="product_div">




               <?php
             $option=$_GET['option'];
               switch($option){
                 case "starters":{
                   $item = "Starters";
                     $result1 = $mysqli->query($startersQuery) or die($mysqli->error.__LINE__);
                 }break;
                 case "seafood":{
                   $item = "Seafood";
                     $result1 = $mysqli->query($seafoodQuery) or die($mysqli->error.__LINE__);
                 }break;
                 case "soups":{
                   $item = "Soups";
                     $result1 = $mysqli->query($soupQuery) or die($mysqli->error.__LINE__);
                 }break;
                 case "specials":{
                   $item = "Specials";
                     $result1 = $mysqli->query($landingQuery) or die($mysqli->error.__LINE__);
                 }break;
                 case "TodaysSpecials":{
                   $item = "Today's Specials";
                     $result1 = $mysqli->query($landingQuery) or die($mysqli->error.__LINE__);
                 }break;
                 case "kids":{
                   $item = "Kids Meals";
                     $result1 = $mysqli->query($kidsQuery) or die($mysqli->error.__LINE__);
                 }break;
                 case "house":{
                   $item = "House recommendations";
                     $result1 = $mysqli->query($houseRecQuery) or die($mysqli->error.__LINE__);
                 }break;
                 case "curry":{
                   $item = "Curry Dishes";
                     $result1 = $mysqli->query($curryQuery) or die($mysqli->error.__LINE__);
                 }break;
                 case "chow":{
                   $item = "Chow mein Dishes";
                     $result1 = $mysqli->query($chowQuery) or die($mysqli->error.__LINE__);
                 }break;
                 case "extra":{
                   $item = "Extra Portions";
                     $result1 = $mysqli->query($extraQuery) or die($mysqli->error.__LINE__);
                 }break;
                 case "minerals":{
                   $item = "Minerals";
                     $result1 = $mysqli->query($mineralsQuery);
                 }break;
                 default:{
                    $item = $option;
                      $searchQuery = "SELECT * FROM PRODUCTS WHERE NAME LIKE '%$option%' ";
                   $result1 = $mysqli->query($searchQuery);
                 }break;
               }//end switchcase
                 //check if rows exist
                 if($result1->num_rows > 0){
                     //loop over the specials
                     $list = '<h1>' . $item . '</h1>';
                     echo $list;
                 }else{
                   echo "No Specials today";
                 }
                   //$result1 = $mysqli->query($landingQuery);
                   //while($row = mysqli_fetch_array($result1))
                     while($row = $result1->fetch_assoc()){
                       $product_id = $row['id'];
                       $product_name = $row['name'];
                       $product_price = $row['price'];
                       $product_catagory = $row['catagory'];
                       $product_image = $row['image'];
                       //this is the product boxes to be displayed
                       echo "
                       <div id='product_box'>
                         <h5>$product_name</h5>
                         <img src='$product_image' width='100' height='100' border='3' alt='food image'/>
                         <p><i>€ $product_price</i></p>
                         <a href='index.php?add_basket=$product_id'><input type='submit' value='add to order' name='item' onclick='addedToBasket();'></a>
                       </div>
                        ";
                   }//end while loop
                ?>




                  </div>





             </section>

         </article>
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
   <!--container ends-->
   </div>

</body>

</html>



<?php
//functions for the main page
function shoppingbasket( $ID){
 include('includes/db.php');
 if(isset($_GET['add_basket'])){
   //get the users ID. for testing purposes this is just set to 1
   $customer_id = $ID;
   $prod_id = $_GET['add_basket'];
   $checkQuery = "SELECT * FROM SHOPPINGBASKET WHERE CUSTOMER_ID = $customer_id AND PRODUCT_ID = $prod_id ";
   //will stop duplicate prod ids from being added.
     $check2 = $mysqli->query($checkQuery);
   if(mysqli_num_rows($check2) > 0){
     //refreshes the page
     echo "";
   }//end if
   else{
     $insert = "INSERT INTO SHOPPINGBASKET (product_id, customer_id) VALUES('$prod_id', '$customer_id')";
       $result2 = $mysqli->query($insert);
       if($result2){
         //refresh the page
         echo "<script>window.open('index.php','_self')</script>";
       }//end check
   }//end else
 }//end if
}//end shopping basket
function calculateBasket($ID){
   include('includes/db.php');
 if(isset($_GET['add_basket'])){
   //hard coded until i build in session variables
   $cust_id = $ID;
   $itemsQuery = "SELECT * FROM SHOPPINGBASKET WHERE CUSTOMER_ID = '$cust_id'";
     $result = $mysqli->query($itemsQuery);
     $numItems = mysqli_num_rows($result);
 }//end if
 else{
   $cust_id = $ID;
   $itemsQuery = "SELECT * FROM SHOPPINGBASKET WHERE CUSTOMER_ID = '$cust_id'";
     $result = $mysqli->query($itemsQuery);
     $numItems = mysqli_num_rows($result);
 }
 echo $numItems;
}//end calculateBasket
function calculatePrice($ID){
//getting the price for the basket
include('includes/db.php');
$totalSum = 0.00;
//hard coded until session added
   $cust_id = $ID;
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
           $sum = array_sum($p);
           //adding sum to total sum
           $totalSum += $sum;
         }//end inner while
     }//end while
echo $totalSum;
}//end calculatePrice
?>
