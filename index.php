<?php include('includes/db.php'); ?>

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

  $searchQuery = "SELECT * FROM PRODUCTS WHERE NAME LIKE '%$option%' ";



  //get results
  //$result1 = $mysqli->query($landingQuery) or die($mysqli->error.__LINE__);

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
    <div id="container">

      <div id="mainBanner">
        <div id="banner">Eat In Restaraunt</div>
          <div id="bannerLogo"> EIR</div>

          </div>
      <div >
            <ul id="navList">
            <li> <a href="index.php">HOME</a></li>
            <li><a href="#" onclick="myFunction();">MENU</a></li>
            <li>  <a href="myorder.html">MY ORDER</a></li>
             <form id="searchBar" >
          Search for product:
          <input type="search" name="option">

          </form>
            </ul>

          </div>

        <!--nav ends-->

        <div id="sidebar"
          <ul class="sideList">
            <li> CATAGORIES<br></li>


            <a href="index.php?option=starters"><li  onclick="myFunction()">Starters</li></a>
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

          <article id="mainArticle">
              <section id="section1">
                <!--This is where all of the php wil go for the body of the website-->

              <table id="mainTable" border="1px">
                <tr>
                    <th>Product</th>
                    <th>Price</th>

                    <th>add to cart</th>
                </tr>


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
                      $result1 = $mysqli->query($mineralsQuery) or die($mysqli->error.__LINE__);
                  }break;

                  case "option":{

                    $item = $option;
                      $result1 = $mysqli->query($searchQuery);
                  }break;

                  default:{

                    $item = " ";
                    echo "no items matching";


                  }


                }//end switchcase

                  //check if rows exist
                  if($result1->num_rows > 0){
                      //loop over the specials
                      $list = '<h1>' . $item . '</h1>';

                      echo $list;
                      while($row = $result1->fetch_assoc()){

                        //display details in the database

                        $output = '<tr id="mainRows">';
                        $output .= '<td>' . $row['name'] . '</td>';
                        $output .= '<td> €' . $row['price'] . '</td>';
                        $output .= '<td> <a href=""><button type="button" name="addtocart">Add to cart</button></a></td>';
                        $output .= '</tr>';
                        echo $output;

                      }//end while loop
                  }else{
                    echo "No Specials today";
                  }


                 ?>



              </table>

              </section>

          </article>
        </div>
        <!--maincontent ends-->
        <footer id="footer">

          <div id="footerText">
    <b>&copy 2017 Eat In Chinese Restraunt | by Eric Strong</b>
          </div>



      <div id="socialMediaIcons">
        <a href="#"><img src="images/facebook-opt.png" alt="facebook logo" width="30px"></a>
        <a href="#"><img src="images/twitter-opt.png" alt="twitterlogo" width="30px"></a>
        <a href="#"><img src="images/linked-in-opt.png" alt="linkedin logo" width="30px"></a>

      </div>

        </footer>
        <!--footer ends-->
    </div>
    <!--container ends-->

</body>

</html>
