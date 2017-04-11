


<!DOCTYPE html>
<html>

<head>
    <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css">

    <title>Login </title>

</head>

<body id="bg1">

    <div id="container">

        <div id="mainBanner">
            <div id="banner">Eat In Restaurant</div>
            <div id="bannerLogo">EIR</div>

        </div>


        <div id="maincontentAbout">

            <div id="aboutUs2">

                  <h1>Welcome to the Eat In Restraunt Page. Please Sign in</h1>


                  <br><br>
                  <form id="loginForm" action="authenticate.php" method="post" >

                    <b>Username: </b><input type="text" name="username" id="username" value="" required>
                    <br><br>
                    <b>Password: </b><input type="password" name="password" id="passord" value="" required>
                    <br><br>

                      <b>Remember me:</b><input type="checkbox" name="remember" value="1">

                    <br><br>
                    <a href="../signup.php">Sign up</a>
                      <br>
                      <br>
                      <br>
                    <input type="submit" name="login" value="Login">
                  </form>


        </div>

    </div>
    </div>


    </body>

</html>
