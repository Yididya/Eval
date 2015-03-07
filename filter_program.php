<?php
include("../evalconnect.php");
$department = $_GET["department"];
$q = "select * from program where dept_id = '$department'";
$r = @mysqli_query($dbc,$q)  or die('Failed to fetch the program under these department');
if(mysqli_num_rows($r)>0)
  {
     while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
      {
      	   $program_id=$row['id'];
           $stream = $row['stream'];
           $program_type = $row['program_type'];
           $degree_type=$row['degree_program'];

           echo "<option value=$program_id>$stream ".$program_type." $degree_type </option>";
      }
   }
  



?>