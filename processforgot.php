<?php session_start();
require_once('functions/alert.php'); 

//collecting the data

$errorCount = 0;


$email = $_POST['email']  != "" ?  $_POST['email'] : $errorCount++;
$_SESSION['email'] = $email;

if ($errorCount > 0) {

    $session_error = "you have " . $errorCount . " error"; 
    if ($errorCount > 1) {
        $session_error .= "s";
    }
    $session_error .=  " in your form submission";
    $_SESSION["error"]= $session_error;
    set_alert('error',$session_error);

    header("Location: forgot.php");

} else {

    $allUsers = scandir("db/users");
    $countAllusers = count($allUsers);

    for ($counter = 0; $counter < $countAllusers; $counter++) {
        $currentUser = $allUsers[$counter];
 
         if ($currentUser == $email . ".json" ) {
      //send the email, and redirect to the reset password page
      // TO DO work on token generation


      /**
       * GENERATE TOKEN CODE STARTS
       * 
       * 
       */

      $token = "dsjilsdjjsjiasuyu";
      $alphabets = ['a','b','c','d','e','f','A','b','C','D','E','F'];

      for ($i=0; $i<26; $i++) {
        //get random number
        // get elements in alphabets at the index of the random number
        // Add that to the token string
        $index = rand(0, count($alphabets)-1);
        $token .= $alphabets[$index];
      }
      
      
      $subject = "Password Reset Link";
      $message = " A password reset has been initiated from your account, if you did not initiate this reset, please ignore this message, otherwise visit: http://localhost/PHP TASK\snh/reset.php?token="  
      . $token;
      $headers = "From: no-reply@snh.org" ."\r\n" .
      "CC: toby@snh.org";

      file_put_contents("db/tokens/" . $email . ".json",json_encode(['token'=>$token]));
      $try = mail($email,$subject,$message,$headers);
   
      if ($try) {
           //send a success message   
        $_SESSION["message"] = " Password reset has been sent to your email "  . $email;
        header("Location: login.php");
      } else {
        
      
        $_SESSION["error"] = " Something went wrong, we could not send password reset to :  "  . $email;
        header("Location: forgot.php");

      }
      die();
            
         }
     }

     $_SESSION["error"] = " Email not registered with us ERR: "  . $email;
     header("Location: forgot.php");

}