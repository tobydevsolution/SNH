
    <?php include_once 'lib/header.php';  require_once('functions/alert.php');
     
      if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])) {
          //redirect to dashboard
         
          header("Location: dashboard.php");

      }
      ?>
        
<h2 style="text-align: center"> <strong> Welcome, Please Register </strong> </h2>
    <p style="text-align: center"> All Fields are required </p>

    <form method="POST" action="processingregister.php">
    <p>
        <?php print_alert(); ?>
            </p>
    <div class="form-field">
        <h3 class="section-title">FirstName</h3>
        <input

        <?php
          if(isset($_SESSION['firstname'])) {
              echo " value =" .  $_SESSION['firstname'];
             
          }
        
            ?>
       
        type ="text" class="text" name="firstname" placeholder= "firstname"/>
    </div>

<div class="form-field">
     <h3 class="section-title">LastName</h3>
    <input

        <?php
          if(isset($_SESSION['lastname'])) {
              echo " value =" .  $_SESSION['lastname'];
             
           
          }
        
            ?>
      
         type ="text" class="text" name="lastname" placeholder="lastname"/>

    </div>
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
       
    <div class="form-field"> 
    <h3 class="section-title">Gender</h3>
         <select name="gender" class="select"> 
         <option> Select here</option>
         <option
         <?php

          if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male') {
              echo "selected";
              
          }
        
            ?>
        

         
         > Male (M) </option>
         <option
         <?php
          if(isset($_SESSION['lastname']) &&  $_SESSION['gender'] == 'Female') {
              echo " selected ";
             
          }
        
            ?>
         
      
         
         > Female (F) </option>

         <option> </option>
        </select>

    </div>
 
    <div class="form-field">  
    <h3 class="section-title">Designation</h3>
         <select name="designation" class="select"> 
         <option

         <?php

        if(isset($_SESSION['gender']) && $_SESSION['designation'] == 'Medical team(MT)') {
            echo "selected";

        }

  ?>
        
        
         >Medical team(MT) </option>
         <option
         <?php

          if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Patient') {
              echo "selected";
             
          }
        
            ?>
        
         
         >Patient </option>
         <option> </option>
        </select>

    </div>
    <div class="form-field">
    <h3 class="section-title">Department</h3>
        <input 
        <?php
          if(isset($_SESSION['department'])) {
              echo " value =" .  $_SESSION['department'];
             
          }
        
            ?>
        type ="text" name="department" placeholder="department" />

    </div>

     <button type="submit" class="button"> Register </button>

 </form>

 <?php include_once 'lib/footer.php';  ?>




        


        
