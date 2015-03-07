<?php 
$instructor_header_link = "active";
$home_header_link = "";
$student_header_link = "";
$program_header_link = "";
$department_header_link = "";
$classroom_header_link = "";
$question_header_link = "";
$course_header_link ="";
$registration_header_link="";
$question_header_link ="";
include("include/header.php"); ?>
    <div class="row">
    	<div class="col-sm-3">       
            <?php include("include/sidenav.html"); ?>        
    	</div>
    	<div class="col-sm-6">
    		    <h1 > Instructors Information</h1>

          <?php
              include("../evalconnect.php");
              
              if ($_SERVER["REQUEST_METHOD"]=="POST"){
                $errs =array();
                if (empty($_POST["name"]))
                  array_push($errs,"You forgot to submit a name of the instructor");

                if (empty($_POST["title"]))
                  array_push($errs,"You forgot to submit job title");


                if (empty($_POST["staff_id"]))
                  array_push($errs,"You forgot to submit the staff_id");

                if (empty($_POST["dept"]))
                  array_push($errs,"You forgot to submit the department");

                if (count($errs)==0){

                        

                      $name = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["name"]));
                      $title = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["title"]));
                      $dept_id = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["dept"]));
                      $staff_id =htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["staff_id"]));

                      $q = "SELECT * FROM department WHERE id='$dept_id' LIMIT 1";
                      $r = @mysqli_query($dbc,$q) or die('<h1>Failed to check wether dept exists!</h1>'.mysqli_error($dbc));
                      if(mysqli_num_rows($r)>0)
                      {
                          
                          $count = 0;
                          while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
                          {
                               $iid = $row["id"];
                               
                               $count++;
                          }
                          $q = "INSERT INTO instructor (instructor_name,dept_id,title,staff_id) VALUES ('$name','$dept_id','$title','$staff_id')";
                          $r = @mysqli_query($dbc,$q) or die('<h1>Failed to add instructor!</h1>'.mysqli_error($dbc));
                          if(mysqli_affected_rows($dbc)>0)
                          {
                            echo "<div class='alert alert-success' role='alert'>
                                    <strong>Well done!</strong> You successfully added $title $name.
                                  </div>";
                          }

                      }                     
                      



                }else{

                  echo "<div class='alert alert-danger' role='alert'>
                                <strong>Oops!</strong> Check your form again.";

                        echo "<ul>";
                      foreach ($errs as $value)
                          echo "<li>$value</li>";

                        
                        echo "</ul></div>";

                        
                }

              }



          ?>
			    <form  class= "form-vertical"role ="form" method="post" action="" enctype="multipart/form-data">
				    <div class ="form-group">

					      <input type="hidden" name="submitted" value="abcf">
					    	<label for="name"  id="label">Instructor's Name  : </label>
					    		
					    		
					    		<input type ="text" class="form-control" name="name" id="text" placeholder ="Ex. Abebe Bekele" sytle ="width:auto">
					    		
					    		
					    		
                <label for="id"  id="label">Staff Id  : </label>
                  <input type ="text" name="staff_id" class="form-control" id="text" placeholder ="Id">                  

					    

					    	<label for="name"  id="label">Instructor's Title  : </label>
					    		<input type ="text" name="title" class="form-control" id="text" placeholder ="Title">
					    
					     

					    	


					    		<div class ="form-group">
					    			<label for="name" style="margin-top:15px">Center Or School: </label>
					    			
                   <select name="dept" class ="form-control" id="name" style ="width:450px">
                     <option value=0>--</option>          
                     <?php
                          $q = "SELECT * FROM department";

                          $r = @mysqli_query($dbc,$q) or die('<h1>Failed to fetch departments!</h1>'.mysqli_error($dbc));
                          if(mysqli_num_rows($r)>0)
                          {
                             while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
                              {
                                   $did = $row["id"];
                                   $dname = $row["dept_name"];
                                   echo "<option value=$did>$dname</option>";
                              }
                           }
                      ?>
					    			  </select>

                  


					    		</div>
					    	

                  
                <div style="text-align:center;margin-top:25px">
                  <button type="submit" style= "margin-top:10px" class="btn btn-success" align="center"><i class="fa fa-send "></i> Submit</button>
					    	</div>





					    
					    
					</div>
				</form>
    	</div>
    	<div class="col-sm-3"></div>
    </div>
    


    </div>

<script src="jquery-1.11.0.min.js"></script>

  <script src="bootstrap/js/bootstrap.js"></script>



  
  <script src="assets/js/vendor/holder.js"></script>
  
  <script src="assets/js/vendor/ZeroClipboard.min.js"></script>
  
  <script src="assets/js/src/application.js"></script>
  




<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>




</body>
</html>