<?php
include('includes/db.php');
 ?>

 

<!DOCTYPE html>
<html>

<head>
    <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <title>Sign up </title>

</head>

<body id="bg1">

    <div id="container">

        <div id="mainBanner">
            <div id="banner">Eat In Restaurant</div>
            <div id="bannerLogo">EIR</div>

        </div>


        <div id="maincontentAbout">

            <div id="aboutUs2">

                  <h1>Please provide your details below</h1>

                  <br><br>
                  <form id="form1" action="signup.php" method="post">
                    <legend>New Customer Sign up</legend>
                    <br>
                    <br>
                    <label for="name">First Name:</label>
                    <input id="formElements" name="name" type="text" placeholder="Enter your First Name" required>
                      <br>
                      <br>
                      <label for="lastname">Last Name:</label>
                      <input id="formElements" name="lastname" type="text" placeholder="Enter your Surname" required>
                        <br>
                        <br>
                      <label for="email">Email:</label>
                      <input id="formElements" name= "email" type="email" placeholder="Enter your Email" required>
                      <br>
                      <br>
                      <label for="password">Password:</label>
                      <input id="formElements" name="password" type="password" placeholder="Enter your password" required>
                      <br>
                      <br>
                      <a href="email.php"><input type="submit" value="sign up" name="register"></a>
                  </form>




        </div>

    </div>
    </div>


    </body>

</html>


<?php
  //to connect to db and create a customer entry
  if(isset($_POST['register'])){

        $firstname = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $insertQuery = "INSERT INTO CUSTOMERS(first_name, last_name, email, password) VALUES('$firstname', '$lastname','$email','$password')";

        $result = $mysqli->query($insertQuery);

        if($result){

          echo "<script>alert('thank you for signing up' . $firstname)</script>";

          header('Location: index.php?option=TodaysSpecials');
          exit;

        }//end if


  } //end if


 ?>
