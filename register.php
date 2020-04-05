
    <?php include_once 'lib/header.php'; ?>
    <p> <strong> Welcome, Please Register </strong> </p>
    <p> All Fields are required </p>

    <form method="POST" action="processingregister.php">

    <p> <label>Firstname </label><br>
        <input type ="text" name="firstname" placeholder= "firstname"/>
    </p>

    <p>  <label>Lastname </label><br>
        <input type ="text" name="lastname" placeholder="lastname" required/>

    </p>

    <p>  <label>Email </label><br>
        <input type ="text" name="email" placeholder="email" required/>

    </p>
       

    <p>  <label>Password </label><br>
        <input type ="password" name="password" placeholder="password" required/>

    </p>
     

        
    <p>  
        <label> Gender </label><br>
         <select name="gender" required> 
         <option> Select here</option>
         <option> Male (M) </option>
         <option> Female (F) </option>

         <option> </option>
        </select>

    </p>

       
    <p>  
        <label>Designation </label><br>
         <select name="designation" required> 
         <option value=""> Select one </option>
         <option>Medical team(MT) </option>
         <option>Patients </option>
         <option> </option>
        </select>

    </p>
    
    <p>  <label>Department </label> <br>
        <input type ="text" name="department" placeholder="department" required/>

    </p>

     <button type="submit"> Register </button>

 </form>

<?php include_once 'lib/footer.php'; ?>





        


        
