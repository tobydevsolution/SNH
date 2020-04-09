<?php session_start();

// collecting the data
$errorCount = 0;

//verifying the data

$firstname = $_POST['firstname'] != "" ?  $_POST['firstname'] : $errorCount++;
$lastname = $_POST['lastname']  != "" ?  $_POST['lastname'] : $errorCount++;
$email = $_POST['email']  != "" ?  $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ?  $_POST['password'] : $errorCount++;
$gender = $_POST['gender'] != "" ?  $_POST['gender'] : $errorCount++;
$designation = $_POST['designation'] != "" ?  $_POST['designation'] : $errorCount++;
$department = $_POST['department'] != "" ?  $_POST['department'] : $errorCount++;


$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;

if($errorCount > 0) {
    //redirect back and display error
    $_SESSION["error"] = "You have " . $errorCount . " errors in your submission";
    header("Location: register.php");

}else {

    //count all users
    // $allUsers = scanddir("db/users");
    // $countAllusers = count($allusers);

    // $newUserId =  $countAllusers+1;

   $userObject = [
    'id' =>1,
    'firstname' =>$firstname,
    'lastname' =>$lastname,
    'email' =>$email,
    'password' =>$password,
    'gender' =>$gender,
    'designation' =>$designation,
    'department' =>$department
   ];

   //save in the database
   file_get_contents("db/users/" .$firstname . $lastname . ".json", json_encode($userObject));
   $_SESSION["message"] = " Registration successful, you can now login!";
   header("Location: register.php");
}

