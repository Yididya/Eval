<?php
  include("../evalconnect.php");
  $department = $_GET["department"];
  
  $q = "select id,course_title from course where dept_id = '$department'";
  $r = @mysqli_query($dbc,$q)  or die('Failed to fetch the courses under these department');
  if(mysqli_num_rows($r)>0)
  {
     while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
      {
           $course_id = $row['id'];
           $course_title = $row['course_title'];
           echo "<option value=$course_id>$course_title</option>";
      }
   }
   echo "<option>$course_title</option>";
  ?>