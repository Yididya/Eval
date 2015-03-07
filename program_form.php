<?php 

$program_header_link ="active";
$home_header_link = "";
$department_header_link = "";
$classroom_header_link = "";
$question_header_link = "";
$course_header_link ="";
$student_header_link = "";
$instructor_header_link = "";
$registration_header_link="";
$question_header_link ="";
include("include/header.php");

?>

    				<!-- Content   -->

    <div class="row">
    	<div class="col-sm-3">
      <?php 
        include("include/sidenav.html");

      ?>       
          
      </div>
    	<div class="col-sm-6">
            <h1 >Program Information</h1>
            <?php

              include("../evalconnect.php");
              
              if (isset($_POST["submitted"])){
                $errs =array();
              

                if (!isset ($_POST["stream"]))
                  array_push($errs,"You have to specify the Stream");

                if (!isset ($_POST["dept"]))
                  array_push($errs,"You have to specify the Department");
                  
                
                if (!isset ($_POST["program_type"]))
                  array_push($errs,"You have to specify the Program Type");

                
                if (!isset ($_POST["degree_program"]))
                  array_push($errs,"You have to specify the Degree Program");
                
                if(!$errs){
                  $stream = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["stream"]));
                  $dept = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["dept"]));
                  $program_type = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["program_type"]));
                  $degree_program= htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["degree_program"]));



                $q = "INSERT INTO PROGRAM(dept_id,stream,program_type,degree_program) VALUES('$dept','$stream','$program_type','$degree_program')";
                
                $r = @mysqli_query($dbc,$q) or die('<h1>Failed to add program!</h1>'.mysqli_error($dbc));
                if (mysqli_affected_rows($dbc)>0){
                  echo "<div class='alert alert-success' role='alert'>
                                    <strong>Well done!</strong> You successfully added Stream: $stream $program_type,$degree_program .
                                  </div>";
                }



                }
                else{

                  echo "<div class='alert alert-danger' role='alert'>
                                    <strong>Oops oops again !</strong> Check your form again please fill in some

                  </div>";


                  
                }




              }






          ?>
      
    	
			    <form  class= "form-vertical"role ="form" action="" method ="post">

				    <div class ="form-group">
                 <input type="hidden"  name ="submitted" value="a">
					       <label for="name"  id="label">Stream : </label>
                 <input type ="text" name ="stream" class="form-control" id="name" placeholder ="Ex. ITSC101">
             


					    	<label for="name"  id="label">Centre or School </label>
					    		 <select name="dept" class ="form-control" id="name" style ="width:450px">
                     <option value=0>--</option>          
                     <?php
                          $q = "SELECT * FROM department";

                          $r = @mysqli_query($dbc,$q) or die('<h1>Failed to fetch departments!</h1>'.mysqli_error($dbc));
                          if(mysqli_num_rows($r)>0)
                          {
                             while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
                              {
                                   $did  = $row["id"];
                                   $dname = $row["dept_name"];
                                   echo "<option value=$did>$dname</option>";
                              }
                           }
                      ?>
                      
                </select>
            
                    


                    
                
					    		
					    		
					    		 
                   <label>Degree Program</label>
                   <select name="degree_program" class ="form-control" id="name" style ="width:450px">
                   <option value=0>--</option>
                   <option value='certificate'>Certificate</option>
                   <option value='undergraduate'>Undergraduate(Bsc)</option>
                   <option value='graduate'>Graduate(Msc)</option>
                   <option value='PhD'>PostGraduate(PhD)</option>
                   </select>

                   <label for="program_type">Program Type</label>
                   
                   <select name="program_type" class ="form-control" id="program_type" style ="width:450px">
                   <option value=0>--</option>
                   <option value='regular'>Regular</option>
                   <option value='extension'>Extension</option>
                   <option value='summer'>Summer</option>
                   </select>    

					     

					    	

              <div style="text-align:center;margin-top:25px">
                <button type="submit" style= "margin-top:10px" class="btn btn-success" align="center"><i class="fa fa-send "></i> Submit</button>
              </div>





					    
					    
					</div>
				</form>
    	</div>


    	<div class="col-sm-3"></div>
    </div>
    


  </div>




</body>
</html>