
    <?php  session_start();
    $_SESSION['TESTING'] = " testing session";

    //print_r($_SESSION);
    include_once('lib/header.php');
    
        ?>


<p> <strong> Welcome, Please Register </strong> </p>
    <p> All Fields are required </p>

    <form method="POST" action="processingregister.php">
        <?php 
            if( isset( $_SESSION['error']) && !empty( $_SESSION['error'])) {
                echo "<span style='color:red'>" .  $_SESSION['error'] . "</span>";
               
               
            
            }

            ?>
    <p> <label>Firstname </label><br>
        <input
        <?php 
        if( isset( $_SESSION['error']) && !empty( $_SESSION['firstname'])) {
                echo "value" .  $_SESSION['firstname'];
                $_SESSION['firstname'] = " ";
                  
            }else {
                echo "value = 'something wrong";
            }
            ?>
        type ="text" name="firstname" placeholder= "firstname"/>
    </p>

    <p>  <label>Lastname </label><br>
        <input
        <?php
        if( isset( $_SESSION['error']) && !empty( $_SESSION['lastname'])) {
                echo "value" .  $_SESSION['lastname'];
                $_SESSION['lastname'] = " ";
                  
            }

            ?> 
         type ="text" name="lastname" placeholder="lastname"/>

    </p>

    <p>  <label>Email </label><br>
        <input
        <?php
           if( isset( $_SESSION['email'])) {
            echo "value" .  $_SESSION['email'];
            $_SESSION['email'] = " ";
              
        }

            ?>
         type ="text" name="email" placeholder="email"/>

    </p>
       

    <p>  <label>Password </label><br>
        <input
        <?php
         
              
        
    
            ?>
        
        type ="password" name="password" placeholder="password"/>

    </p>
       
    <p>  
        <label> Gender </label><br>
         <select name="gender"> 
         <option> Select here</option>
         <option

         <?php

    if( isset( $_SESSION['gender']) &&  $_SESSION['gender'] == 'Male') {
        echo "selected";
       
        }

        ?>
         
         > Male (M) </option>
         <option

         
         <?php

        if( isset( $_SESSION['gender']) &&  $_SESSION['gender'] == 'Female') {
            echo "selected";
       
    }
        ?>
         
         > Female (F) </option>

         <option> </option>
        </select>

    </p>
 
    <p>  
        <label>Designation </label><br>
         <select name="designation"> 
         <option value=""> Select one </option>
         <option
         <?php
              if( isset( $_SESSION['designation'])) {
                echo "value" . $_SESSION['Medical team(MT)'];      
          }
        ?>
        
         >Medical team(MT) </option>
         <option

         <?php
              if( isset( $_SESSION['designation'])) {
                echo "value" . $_SESSION['Patients'];      
          }


        ?>
         
         >Patients </option>
         <option> </option>
        </select>

    </p>
    
    <p>  <label>Department </label> <br>
        <input 
        <?php
          if( isset( $_SESSION['department'])) {
              echo "value" . $_SESSION['civil'];      
        }
            ?>
        
        type ="text" name="department" placeholder="department" />

    </p>

     <button type="submit"> Register </button>

 </form>

<?php include 'lib/footer.php'; ?>





        


        
