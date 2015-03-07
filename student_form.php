<script src="jquery-1.11.0.min.js"></script>
<?php 
$student_header_link = "active";
$instructor_header_link = "";
$home_header_link = "";
$program_header_link = "";
$department_header_link = "";
$classroom_header_link = "";
$question_header_link = "";
$course_header_link ="";
$registration_header_link="";
$question_header_link="";

include("include/header.php"); ?>
    <div class="row">
    	<div class="col-sm-3">
    		<?php 
    			include ("include/sidenav.html");

    		?>

    	</div>
    	<div class="col-sm-6">
    		    <h1 > Student Information</h1>

    		    <?php

    		    	include("../evalconnect.php");
    		    	if($_SERVER["REQUEST_METHOD"]=="POST"){
	    		    	$errs =array();
	    		    	

	    		    	if (empty($_POST["name"]))
	    		    		array_push($errs,"Name of the student is required");
	    		    	if (empty($_POST["id"]))
	    		    		array_push($errs,"Id of the student is required");
	    		    	if (empty($_POST["year"]))
	    		    		array_push($errs,"Year is required");
	    		    	if (empty($_POST["program"]))
	    		    		array_push($errs,"Program is required");
	    		    	if (empty($_POST["dept"]))
	    		    		array_push($errs,"Department is required");

						$name = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["name"]));
						$id = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["id"]));
						$year = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["year"]));
						$program = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["program"]));
						$dept= htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["dept"]));
						$def_passcode= sha1($id);


						if(count($errs)==0){
							$q ="INSERT INTO USER (reg_date,user_name,user_type,password) values(curdate(),'$name','student','$def_passcode')";
							$r = @mysqli_query($dbc,$q) or die("<h1>failed to Register user</h1>".mysqli_error($dbc));
							
							$select_query="select id from user where user_name='$name' limit 1";
							$rs=@mysqli_query($dbc,$select_query) or die("Failed to fetch!!");
							
							$row = mysqli_fetch_array($rs,MYSQLI_ASSOC);

							$user_id = $row["id"];


							$q2 ="INSERT INTO student(user_id,user_name,year, program_id,student_id) values('$user_id','$name','$year','$program','$id')";

							$r2 =@mysqli_query($dbc,$q2) or die ("<h1>Failed to register student</h1>".mysqli_error($dbc));

							if(mysqli_affected_rows($dbc)>0){
								echo "<div class='alert alert-success' role='alert'>
                                    <strong>Well done!</strong> You successfully added $name into the database
                                  </div>";

							}









						}


    		    	


    		    	

    		    	}




    		    ?>




			    <form  class= "form-vertical"role ="form" method="post"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				    <div class ="form-group">
				    		<input type ="hidden" value ="abc" name="submitted">

					    
					    	<label for="name"  id="label">Student's Name  : </label>
					    		<input type ="text" class="form-control" name ="name" id="text" placeholder ="Ex. Abebe Bekele">

					    	<label for="name"  id="label">Id  : </label>
					    		<input type ="text" class="form-control" name="id" id="text" placeholder ="Ex ATR/1722/05">



					    		
					    		
					    	<div class ="form-group">
			                    <label for="name" style="margin-top:15px">Center Or School: </label>
			                    <select  class ="form-control" id="dept" style ="width:450px" name="dept">
			                     <option>--</option>          
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

         	                <script type="text/javascript">
				                $(document).ready(function(){
				                    $('#dept').change(function(){
				                        var department = $(this).val();
				                        $("#course").load("filter_course.php?department="+department);
				                        $("#program").load("filter_program.php?department="+department);
				                    });

				                    
				                    
				                  });

				            </script>


			              <div class ="form-group">
			                    <label for="name" style="margin-top:15px">Program: </label>
			                    <select  class ="form-control" id="program" style ="width:450px" name="program">
			                     <option>--</option>          
			                        
			                      </select>
			              </div>



					    
					    		
					    		
					    	
					    
					    

					    	
					    		<div class ="form-group">
					    			<label for="name" style="margin-top:15px" >Year: </label>
					    			<select name ="year" class ="form-control" id="name" style ="width:100px"> 
					    				<option value=1>1</option>
					    				<option value=2>2</option>
					    				<option value=3>3</option>
					    				<option value=4>4</option>
					    				<option value=5>5</option>
					    				
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