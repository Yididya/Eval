

<script src="jquery-1.11.0.min.js"></script>

<?php 
$question_header_link ="active";
$department_header_link = "";
$program_header_link ="";
$home_header_link = "";
$classroom_header_link = "";

$course_header_link ="";
$student_header_link = "";
$instructor_header_link = "";
$registration_header_link="";


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
    		    <h1 > Add Questions</h1>  
                <?php
                    include("../evalconnect.php");
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        
                        
                        $errs =array();
                        foreach($_POST as $key =>$val){
                            
                            if(empty($_POST[$key])){
                                array_push($errs,$key."is not filled correctly");

                            }


                        }

                        if (count($errs)==0){

                            foreach($_POST as $key => $val){
                                $q="INSERT INTO question(question) values('$val')";
                                $r =@mysqli_query($dbc,$q) or die("<h1>failed to insert quesion due to query problem</h1>");


                            }

                                if(mysqli_affected_rows($dbc)>0){
                                        echo "<div class='alert alert-success' role='alert'>
                                            <strong>Well done!</strong> You successfully added the questions .
                                            </div>";      
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


                <script type="text/javascript">
                var count=0
                $(document).ready(function(){
                    var count = 1;
                    $("#add_input").click(function(){
                        
                        $("#question_group").append("<div class='form-group' id= 'div"+count+"'><input type ='text' style='margin:15px' class='form-control'  placeholder ='Question # "+count+"' id= 'question"+count+"' name='question#"+count+"'><button type='button' class='btn btn-danger remove_btn'>Remove</button></div>");



                        count++; 





                    });
                    $("#remove_input").click(function(){
                        if(count <= 0){
                            alert("Add some");

                        }else{
                            count--;
                            $("#question" + count).remove();
                            
                        }
                    });
                    $("#submit_btn").click(function(){
                        alert("Attempt to submit");

                        

                    });
                    $(".btn-danger").click(function(){
                        alert("haha");
                       // $(this).parent().remove();

                    });
                    $("#question_group button.remove_btn").click(function(){
                        $(this).parent().remove();
                    });




                });

                

                </script>

                        		    
                <form class ="form-vertical" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            

                            <div id="question_group">
                                

                            </div>


                            <div class="btn-group" >
                            <a href="#add_input"></a>
                                            <a type ="button" class="btn btn-primary" id="add_input" href="#add_input">Add Entry</a>
                                            <a type ="button" class="btn btn-primary" id="remove_input" href="#remove_input">Remove</a>


                            </div>
                            
                            
                            <div style="text-align:center;margin-top:25px">
                                  <button type="submit" style= "margin-top:10px" id="submit_btn" class="btn btn-success" align="center"><i class="fa fa-send "></i> Submit #Questions</button>
                            </div>


                        
                        

                </form>


    	</div>
    	
        <div class="col-sm-3"></div>
    </div>
    


  


</body>
</html>