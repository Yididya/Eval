<?php 
$department_header_link = "active";
$program_header_link ="";
$home_header_link = "";
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
    		    <h1 > Department Information</h1>
    		    <?php
    		    	include("../evalconnect.php");

                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                        $errs =array();

                        if (empty($_POST["dept_name"]))
                            array_push($errs ,"You have not yet submitted Department name !");
                        if (empty($_POST["dept_head"]))
                            array_push($errs ,"You have not yet submitted Department head !");
                        if (empty($_POST["dept_type"]))
                            array_push($errs ,"You have not yet submitted Department type !");
                        

                        if(count($errs)==0){
                            $dept_name = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["dept_name"]));
                            $dept_head = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["dept_head"]));
                            $dept_type = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["dept_type"]));

                            $q = "INSERT INTO Department(dept_name,dept_head,dept_type) values('$dept_name','$dept_head','$dept_type')";
                            $r = @mysqli_query($dbc,$q) or die('<h1>Failed to add department!</h1>'.mysqli_error($dbc));
                            if(mysqli_affected_rows($dbc)>0){
                            echo "<div class='alert alert-success' role='alert'>
                                    <strong>Well done!</strong> You successfully added Department : $dept_name Head: dept_head .
                                  </div>";



                        }else{
                            echo "<div class='alert alert-danger' role='alert'>
                                    <strong>Oops !</strong> Check your form again.";
                            echo "<ul>";
                            foreach($errs as $a)
                            echo "<li>$a</li>";
                            echo "</ul></div>";


                        }




                    }
}

                    /*
    		    	if ($_POST["submitted"]){

    		    		$errs =array();
    		    		if (!isset($_POST["dept_name"]))
    		    			array_push($errs ,"You have not yet submitted Department name !");
    		    		if (!isset($_POST["dept_head"]))
    		    			array_push($errs ,"You have not yet submitted Department head !");
    		    		if (!isset($_POST["dept_type"]))
    		    			array_push($errs ,"You have not yet submitted Department type !");


    		    		if(!$errs){


    		    			
                          }


                        */




    		    	







    		    ?>


			    <form  class= "form-vertical"role ="form" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
				    <div class ="form-group">
				    		<input type ="hidden" name="submitted"value="1">
					    
					    	<label for="name"  id="label">Name of Department : </label>
					    		<input type ="text" class="form-control" id="text" placeholder ="Ex. School of Electrical and Computer Engineering" name ="dept_name">
					    		
					    		
					    		


					    

					    	<label for="name"  id="label">Department Head: </label>
					    		<input type ="text" class="form-control" id="text" placeholder ="Ex. Jhon Digel" name="dept_head">
					   

					    	<label>Department type</label>
		                   <select name="dept_type" class ="form-control" id="name" style ="width:450px">
		                   <option value=0>--</option>
		                   <option value='center'>Center</option>
		                   <option value='school'>School</option>
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