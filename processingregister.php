 <?php  require_once 'functions/users.php';
        require_once 'functions/alert.php';
  
session_start();

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
// $_SESSION['password'] = $password;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;


if ($errorCount > 0) {
    //Display proper messages to the user
    // Give more accurate feedback to the user
    $session_error = "you have " . $errorCount . " error"; 
    if ($errorCount > 1) {
        $session_error .= "s";
    }
    $session_error .=  " in your form submission";
    $_SESSION["error"]= $session_error;
}

else {

    $newUserId =  ($countAllusers-1)+2;
    $userObject = [

        'id'=>$newUserId,
        'firstname'=>$firstname,
        'lastname'=>$lastname,
       'email' =>$email,
       'password' =>password_hash($password, PASSWORD_DEFAULT),
       'gender' =>$gender,
       'designation' =>$designation,
       'department' =>$department

      ];

      // Check if the user already exists
      $userExists = find_user($email);
        if ($userExists) {
           $_SESSION["error"] = "Registration failed user already exists ";
           header("Location: register.php");
           die();
           
        }
    //save in the database
    save_user($userObject);
    $_SESSION["message"] = "Your Registration has been successful "  . $firstname;
    header("Location: login.php");


}

