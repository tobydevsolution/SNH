<?php

session_start();

// collecting the data
$errorCount = 0;

if(!$_SESSION['loggedin']) {
    $token = $_POST['token']  != "" ?  $_POST['token'] : $errorCount++;

}


//verifying the data


$email = $_POST['email']  != "" ?  $_POST['email'] : $errorCount++;
$password = $_POST['password']  != "" ?  $_POST['password'] : $errorCount++;


$_SESSION['email'] = $email;

$_SESSION['token'] = $token;




if ($errorCount > 0) {
   
    $session_error = "you have " . $errorCount . " error"; 
    if ($errorCount > 1) {
        $session_error .= "s";
    }
    $session_error .=  " in your form submission";
    $_SESSION["error"]= $session_error;

    header("Location: reset.php");
} else {

//check that the email is registered in tokens folder
//check if the content of the registered token (in our folder), is the same as $token

$allUserTokens = scandir("db/tokens");

$countAlluserTokens = count($allUserTokens);

for ($counter = 0; $counter < $countAlluserTokens; $counter++) {
    $currentTokenFile = $allUserTokens[$counter];

     if ($currentTokenFile == $email . ".json" ) {
     //Now check if the token in the currentTokenFile is the same as $token
        
             //check the user password
             $tokenContent = file_get_contents("db/tokens/". $currentTokenFile);
             $tokenObject = json_decode($tokenContent);
            
             $tokenFromDB = $tokenObject->token;

// TO DO: Make this better, fix the temporary fix
        if(!$_SESSION['loggedin']) {
            $checkToken = true;
                echo "Got here position 1";
             }else {
               $checkToken = $tokenFromDB == $token;
                echo "Got here position 2";
             }
           die();
    if($checkToken) {
        $allUsers = scandir("db/users");
        $countAllusers = count( $allUsers);
  
                 
    for ($counter = 0; $counter < $countAllusers; $counter++) {
        $currentUser = $allUsers[$counter];
 
         if ($currentUser == $email . ".json" ) {
            
             //check the user password
             $userString = file_get_contents("db/users/". $currentUser);
             $userObject = json_decode($userString);
            
  
             $userObject->password = password_hash($password, PASSWORD_DEFAULT);
               
            unlink("db/users/" .$currentUser); // file delete user data delete
            file_put_contents("db/users/". $email . ".json", json_encode($userObject));
              
             $_SESSION["message"] = "Password Reset successful you can now login";

            
            //   iNFORM USEROF PASSWORD RESET
            $subject = "Password Reset Successful";
            $message = " You re account on snh has just been updated, Your password has changed if you did not initiate the password change, please visit snh.org and reset your password immediately";
            $headers = "From: no-reply@snh.org" ."\r\n" .
            "CC: toby@snh.org";

             $try = mail($email,$subject,$message,$headers);
            // INFORM USER OF PASSWORD RESET ENDS

            
            header("Location: login.php");

            die();
                
             }
         }
        
            
        }
        
        }
        }
    
 
    $_SESSION["error"] = "Password Reset failed, token/email invalid or expired ";
    header("Location: login.php");

}


