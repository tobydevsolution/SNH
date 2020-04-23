
        <p>
         
        <a href="index.php">Home</a>
      <?php  if(!isset($_SESSION['loggedIn'])) { ?>

        <a href="login.php">login</a>
        <a href="register.php">Register</a>
        <a href="forgot.php">Forgot password</a>

      <?php }else { ?>
        <a href="logout.php">logout</a>
        <a href="reset.php">Reset password</a>
      <?php } ?>
        
        
        
        </p> 

        

        

              <script src="js/jquery.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.js"></script> 
</body>
</html>