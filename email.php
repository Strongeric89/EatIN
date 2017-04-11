<?php

    if(isset($_POST['submit'])){


          $name = $_POST['name'];
          $emailFrom = $_POST['email'];
          $phone = $_POST['phone'];
          $date = $_POST['date'];
          $message = $_POST['message'];


          $message2 = "From:<b>$name</b><br>Email:<b>$emailFrom</b><br>Phone:<b>$phone</b><br>Date:<b>$date</b><br>Message:<b>$message</b>";

          echo $message2;

          $subject = "Eat In Restraunt Enquiry";
          $mailto = "c15708709@mydit.ie";

          $headers = "From: blah@gmail.com" . '\r\n' . "CC: ericstrong89@gmail.com";

          mail($mailto,$subject,$message2,$headers);

          echo "<br>email Sent";





    }//end if

?>
