
<script src="jquery-1.11.0.min.js"></script>
<?php 

$classroom_header_link = "active";
$course_header_link ="";
$instructor_header_link = "";
$home_header_link = "";
$student_header_link = "";
$program_header_link = "";
$department_header_link = "";

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
            <h1 > Classroom Information</h1>
            <?php
              include("../evalconnect.php");

              if($_SERVER['REQUEST_METHOD']=="POST"){
                $errs =array();
                if (empty($_POST["instructor_name"]))
                  array_push($errs,"You forgot to submit a name of the instructor");

                if (empty($_POST["academic_year"]))
                  array_push($errs,"You forgot to submit job title");


                if (empty($_POST["semester"]))
                  array_push($errs,"You forgot to submit the semester");

                if (empty($_POST["dept"]))
                  array_push($errs,"You forgot to submit the department");

                if(empty($_POST["program"]))
                  array_push($errs,"You forget to submit the program");

                foreach($errs as $value){
                  echo $value;
                }


                if(count($errs)==0){

                    $instructor_name = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["instructor_name"]));
                    $academic_year = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["academic_year"]));
                    $semester = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["semester"]));
                    $dept = htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["dept"]));
                    $course_id=htmlspecialchars(mysqli_real_escape_string($dbc,$_POST["course"]));

                    $program_id =htmlspecialchars(mysqli_real_escape_string($dbc, $_POST["program"]));

                    
                    $q1 = "select id from instructor where instructor_name='$instructor_name' limit 1";
                    $r1= @mysqli_query($dbc,$q1) or die("Unable to find the Instructor.The instructor is not yet registered");
                    
                    
                    
                    $row = mysqli_fetch_array($r1,MYSQLI_ASSOC);
                              
                    $instructor_id = $row["id"];

                             
                    
                    


                    $q= "INSERT INTO classroom(instructor_id,academic_year,semester,course_id,program_id) values('$instructor_id', '$academic_year','$semester','$course_id','$program_id')";

                    $r= @mysqli_query($dbc,$q) or die('<h1>Failed to execute insert statement </h1>'.mysqli_error($dbc));


                    if (mysqli_affected_rows($dbc)>0){
                        echo "<div class='alert alert-success' role='alert'>
                                    <strong>Well done!</strong> You successfully added the Program
                                  </div>";



                    }

                    

                }




             }
              

            ?>


          <form  class= "form-vertical"role ="form" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
            <div class ="form-group">

              
                <label for="name"  id="label">Instructor Name : </label>
                  <input type ="text" class="form-control" id="text" placeholder ="Ex. Abebe Kebede" name="instructor_name">

                  
                  
                  


              

                <label for="name"  id="label">Academic Year: </label>
                  <input type ="text" class="form-control" id="text" placeholder ="Ex. 2014-15" name="academic_year">
             


                <label for="name"  id="label">Semester : </label>
                  <select class="form-control" style="width:450" name="semester">
                    <option value=0>--</option>
                    <option value=1>Semester One</option>
                    <option value=2>Semester Two</option>

                  </select>


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
                    <label for="name" style="margin-top:15px">Course: </label>
                    <select  class ="form-control" id="course" style ="width:450px" name="course">
                     <option>--</option>          
                        
                      </select>
              </div>





              

              <div class ="form-group">
                    <label for="name" style="margin-top:15px">Program: </label>
                    <select  class ="form-control" id="program" style ="width:450px" name="program">
                     <option>--</option>          
                        
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