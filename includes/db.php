<?php

//THE FOLLOWING WILL ENSURE A CONNECTION TO THE DATABASE
$db_name = "restraunt";
$mysql_user= "root";
$mysql_pass = "7512";
$server_name = "localhost";

$mysqli = new mysqli($server_name,$mysql_user,$mysql_pass,$db_name);


if(mysqli_connect_errno()){
  echo "failed to connect";
  die();

}


?>
