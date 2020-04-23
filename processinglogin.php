

<?php 
session_start();
 

 $errorCount = 0;
$email = $_POST['email']  != "" ?  $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ?  $_POST['password'] : $errorCount++;


$_SESSION['email'] = $email;
$_SESSION['password'] = $password;


if ($errorCount > 0) {
    //Display proper messages to the user
    // Give more accurate feedback to the user
    $session_error = "you have " . $errorCount . " error"; 
    if ($errorCount > 1) {
        $session_error .= "s";
    }
    $session_error .=  " in your form submission";
    $_SESSION["error"]= $session_error;

    header("Location: login.php");
} else {
    

    $allUsers = scandir("db/users");
    $countAllusers = count($allUsers);
    
    for ($counter = 0; $counter < $countAllusers; $counter++) {
        $currentUser = $allUsers[$counter];
 
         if ($currentUser == $email . ".json" ) {
            
             //check the user password
             $userString = file_get_contents("db/users/". $currentUser);
             $userObject = json_decode($userString);
             $passwordFromDB = $userObject->password;
  
             $passwordFromUser = password_verify($password, $passwordFromDB);
               
            
             if ($passwordFromDB == $passwordFromUser) {
                 //redirect to dashboard
                 $_SESSION['loggedIn'] =  $userObject->id;
                 $_SESSION['email'] =  $userObject->email;
                 $_SESSION['fullname'] =  $userObject->firstname . " " . $userObject->lastname;
                 $_SESSION['role'] =  $userObject->designation;
                
                  header("Location: dashboard.php");

                 die();
  
             }
 
         }
     }

        $_SESSION["error"] = " Invalid Email or password ";
        header("Location: login.php");
        die();

}

