<?php 
$registration_header_link="active";
$department_header_link = "";
$program_header_link ="";
$home_header_link = "";
$classroom_header_link = "";
$question_header_link = "";
$course_header_link ="";
$student_header_link = "";
$instructor_header_link = "";

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
			    <form  class= "form-vertical"role ="form">
				    <div class ="form-group">

					    
					    	<label for="name"  id="label">Course Title  : </label>
					    		<input type ="text" class="form-control" id="text" placeholder ="Ex. Fundamentals of Database">
					    		
					    		
					    		


					    

					    	<label for="name"  id="label">Course Code : </label>
					    		<input type ="text" class="form-control" id="text" placeholder ="Ex. ITSC101">
					   


					    	<label for="name"  id="label"> ECTS : </label>
					    		<input type ="text" class="form-control" id="text" placeholder ="Credit Hours in ECTS">
					    

					    <div class ="form-group">
					    			<label for="name" style="margin-top:15px">Center Or School: </label>
					    			<select class ="form-control" id="name" style ="width:450px"> 
					    				<option>School of Electrical and computer Engineering</option>
					    				<option>Center of Information Technology and Scientific Computing</option>
					    				<option>Center of BioMedical Engineering</option>
					    				<option>School of Civil and Environmental Engineering</option>
					    				<option>School of Mechanical Engineering</option>
					    				<option>School of Chemical Enginnering</option>
					    			</select>
					    </div>

					    	<div style="text-align:center;margin-top:25px">

					    	<button style= "margin-top:10px"class= "btn btn-default" align="center"> Submit</button>
					    	</div>





					    
					    
					</div>
				</form>
    	</div>
    	<div class="col-sm-3"></div>
    </div>
    


  </div>




</body>
</html>