<?php include_once 'lib/header.php'; 
require_once('functions/alert.php'); 
require_once('functions/users.php'); 

//if token is set
if(!is_user_loggedIn() && !is_token_set()) {
    $_SESSION["error"] = "You are not authorized to view that page";
    header("Location: login.php");
}

?>


<h1> Reset Password </h1>
<p> Provide the email address associated with your account: [email] </p>

<form action="processreset.php" method="POST">


    <p>
        <?php print_alert();  ?>

            </p>

            <?php  if(!is_user_loggedIn())  { ?>
    <input
    <?php
      if(is_token_set_in_session()){
                 
        echo "value='". $_SESSION['token'] ."'";
        }else {
      echo " value='". $_GET['token'] ."'";

          }
    
    ?>
    type = "hidden" name="token" />

        <?php } ?>

    <p>  <label>Email </label><br>
        <input

        <?php
          if(isset($_SESSION['email'])) {
              echo " value =" .  $_SESSION['email'];
        
          }
        
            ?>
         type ="text" name="email" placeholder="email"/>

    </p>

    
    <p>  <label>Enter New Password </label><br>
        <input
      
        type ="password" name="password" placeholder="password"/>

    </p>

    <button type="submit"> Reset Password </button>

    </form>



<?php include_once 'lib/footer.php'; ?>