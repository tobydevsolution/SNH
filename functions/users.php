<?php require_once 'alert.php';
      require_once 'users.php';


function is_user_loggedIn() {

    if($_SESSION['loggedIn'] && !empty (!$_SESSION['loggedIn'])) {
        return true;
    }
    return false;
}  

function is_token_set() {
    return is_token_set_in_get() || is_token_set_in_session();

}

function is_token_set_in_session() {
    return isset ($_SESSION['token']);
}


function is_token_set_in_get() {
    return isset ($_GET['token']);
}

function find_user($email = "") {
// Help us check db and find if user exists

if(!$email) {
    set_alert('error','User Email is not set');
    die();
 }
$allUsers = scandir("db/users");

$countAllusers = count($allUsers);
print_r($allUsers);



for ($counter = 0; $counter < $countAllusers; $counter++) {
    $currentUser = $allUsers[$counter];

     if ($currentUser == $email . ".json" ) {
         //check the user password
         $userString = file_get_contents("db/users/" .$currentUser);
         $userObject = json_decode($userString); 
        
        return $userObject;
        
     }
    }
}
    return false;

function save_user($userObject) {
    file_put_contents("db/users/". $userObject['email'] . $newUserId . ".json", json_encode($userObject));
              
}
