<?php 


$course_header_link ="active";
$instructor_header_link = "";
$home_header_link = "";
$student_header_link = "";
$program_header_link = "";
$department_header_link = "";
$classroom_header_link = "";
$question_header_link = "";
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
    		    <h1 > Course Information</h1>
            <?php
              include("../evalconnect.php");


              if ($_SERVER["REQUEST_METHOD"]=="POST"){
                $errs =array();
                if (empty($_POST["course_title"]))
                  array_push($errs,"You forgot to submit a name of the instructor");

                if (empty($_POST["course_code"]))
                  array_push($errs,"You forgot to submit job title");


                if (empty($_POST["course_ECTS"]))
                  array_push($errs,"You forgot to submit the staff_id");

                if (empty($_POST["dept"]))
                  array_push($errs,"You forgot to submit the department");
                

                if (count($errs)==0){
                      $course_title = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["course_title"]));
                      $course_code = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["course_code"]));
                      $ects = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["course_ECTS"]));
                      $dept_id =htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["dept"]));

                       
                      $q = "INSERT INTO course (course_title,course_code,ects,dept_id) VALUES ('$course_title','$course_code','$ects','$dept_id')";
                      $r = @mysqli_query($dbc,$q) or die('<h1>Failed to add Course!</h1>'.mysqli_error($dbc));
                      if(mysqli_affected_rows($dbc)>0)
                          {
                            echo "<div class='alert alert-success' role='alert'>
                                    <strong>Well done!</strong> You successfully added $course_title .
                                  </div>";

                          }

                }else{





                }

              
              }

            ?>


			    <form  class= "form-vertical"role ="form" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
				    <div class ="form-group">

					    
					    	<label for="name"  id="label">Course Title  : </label>
					    		<input type ="text" class="form-control" id="text" placeholder ="Ex. Fundamentals of Database" name ="course_title">
					    		
					    		
					    		


					    

					    	<label for="name"  id="label">Course Code : </label>
					    		<input type ="text" class="form-control" id="text" placeholder ="Ex. ITSC101" name="course_code">
					   


					    	<label for="name"  id="label"> ECTS : </label>
					    		<input type ="text" class="form-control" id="text" placeholder ="Credit Hours in ECTS" name="course_ECTS">
					    

					    <div class ="form-group">
					    			<label for="name" style="margin-top:15px">Center Or School: </label>
					    			<select name="dept" class ="form-control" id="name" style ="width:450px" name="dept">
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

					    	<button style= "margin-top:10px"class= "btn btn-success" align="center"><i class="fa fa-send"></i> Submit</button>
					    	</div>





					    
					    
					</div>
				</form>
    	</div>
    	<div class="col-sm-3"></div>
    </div>
    


  </div>



</body>
</html>