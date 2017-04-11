<?php
session_start();
include ('includes/db.php');
?>
<!DOCTYPE html>
<html>

<head>
    <script src="js/myscripts.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">

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
                  <form id="loginForm" action="login.php" method="post">

                    <b>Email:
