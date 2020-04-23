    

<?php include_once 'lib/header.php';  ?>

<?php
if(!isset($_SESSION['loggedIn'])) {
          //redirect to login page
         
          header("Location: login.php");

      }
      ?>
 
    <h3> Dashboard </h3>
    Loggedin User ID: <?php  echo $_SESSION['loggedIn']  ?>
    Welcome, <?php echo $_SESSION['fullname']?>, You are logged In  as (<?php echo $_SESSION['role'] ?>), and your ID is <?php  echo $_SESSION['loggedIn']  ?> 


<?php include_once 'lib/footer.php';  ?>