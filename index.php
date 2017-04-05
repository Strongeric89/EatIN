<?php include('includes/db.php');

//sets up the option get variable as its not set on run
if(!isset($_GET['option'])){

   header('Location: index.php?option=TodaysSpecials');
   exit;
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

  //get results
//   $result1 = $mysqli->query($landingQuery);
// $_GET['id']=1;





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
        <div id="banner">Eat In Restaurant</div>
          <div id="bannerLogo"> EIR</div>

          </div>
      <div>
            <ul id="navList">
            <li> <a href="index.php?option=TodaysSpecials">HOME</a></li>

            <li>  <a href="myorder.php">MY ORDER</a></li>

              <!-- onclick="myFunction();" -->
            <li><a href="aboutUs.html" >ABOUT US</a></li>
             <form id="searchBar">
          Search for product:
          <input type="search" name="option">


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
              <a href=index.php?option=house><li>House Recommendations</li></a>
              <a href="index.php?option=curry"><li>Curry Dishes</li></a>
            <a href="index.php?option=chow">  <li>Chow Mein Dishes</li></a>
            <a href="index.php?option=extra">  <li>Extra Portions</li></a>
            <a href="index.php?option=minerals">  <li>Minerals</li></a>


          </ul>
        </div>
        <!--sidebar ends-->
        <div id="maincontent">

          <div id="myorder">
            <b>Your Shopping Cart Total: €0.00</b>

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
                          <a href='index.php?product_id=$product_id'><input type='submit' value='add to order' name='item'></a>

                        </div> ";


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
