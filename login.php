<?php  include_once 'lib/header.php';
        require_once('functions/alert.php');
       

if(!isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])) {
    //redirect to dashboard
    header("Location: dashboard.php");
}

?>
 <h2 style="text-align:center"> Login </h2>
    <p>

    <?php print_alert();  ?> 
        
    </p>
    

    <form method="POST" action="processinglogin.php">
        <p>
        <?php ?>
    
            </p>
       

    <div class="form-field"> 
    <h3 class="section-title">Email</h3>
        <input

        <?php
          if(isset($_SESSION['email'])) {
              echo " value =" .  $_SESSION['email'];
        
          }
        
            ?>
         type ="text" class="text" name="email" placeholder="email"/>

    </div>
       

    <div class="form-field"> 
    <h3 class="section-title">Password</h3>
        <input
      
        type ="password" class="text" name="password" placeholder="password"/>

        </div>

     <button type="submit" class="button"> Login </button>

 </form>

 
<?php include_once 'lib/footer.php'; ?>