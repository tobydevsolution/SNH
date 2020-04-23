<?php include_once 'lib/header.php';  require_once('functions/alert.php');?>

<h1> Forgot Password </h1>
<p> Provide the email address associated with your account </p>

<form action="processforgot.php" method="POST">


    <p>
        <?php print_alert(); ?>
        
            </p>

    <div class="form-field">
        <h3 class="section-title">Email:</h3> 

        <input

        <?php
          if(isset($_SESSION['email'])) {
              echo " value =" .  $_SESSION['email'];
        
          }
        
            ?>
         type ="text" class="text" name="email" placeholder="email"/>

    </div>

    <button type="submit" class="button"> Send Reset Code </button>

    </form>

<?php include_once 'lib/footer.php'; ?>