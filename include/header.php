

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href ="bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" href ="bootstrap/css/bootstrap-theme.min.css">
	<link rel= "stylesheet" href ="style.css">
	<link href="assets/css/src/pygments-manni.css" rel="stylesheet">
	<link href="assets/css/src/docs.css" rel="stylesheet">
	<script src="assets/js/ie-emulation-modes-warning.js"></script>
	<link rel ="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">
	<script src ="bootstrap/js/bootsrap.min.js"></script>



	<title></title>
</head>
<body>

	
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Eva</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php echo "class='$home_header_link'"; ?>><a href="#" class="topnav_home"><i class="fa fa-home fa-1x"> Home</i></a></li>
            <li <?php echo "class='$instructor_header_link'"; ?> ><a href="instructor_form.php">Instructors</a></li>
            <li <?php echo "class='$student_header_link'"; ?>><a href="student_form.php">Students</a></li>
            <li <?php echo "class='$course_header_link'"; ?>><a href="course_form.php">Courses</a></li>
            <li <?php echo "class='$program_header_link'"; ?>><a href="program_form.php">Program</a></li>
            <li <?php echo "class='$department_header_link'"; ?>><a href="department_form.php">Department</a></li>
            <li <?php echo "class='$classroom_header_link'"; ?>><a href="classroom_form.php">ClassRoom</a></li>
            <li <?php echo "class='$registration_header_link'"; ?>><a href="registration_form.php">Registration</a></li>
            <li <?php echo "class='$question_header_link'"; ?>><a href="question_form.php">Question</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
            <li class="active"><a href="login.html">Sign Out<span class="sr-only">(current)</span></a></li>
            
          </ul>
        </div>
      </div>
    </nav>
