<?php include_once('main.php');?>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href="../../source/css/style.css">
		<script src = "JS/login_logout.js"></script>
	</head>
    <body>
		<div class="header"><h1>School Management System</h1></div>
		<div class="divtopcorner">
			<img src="../../source/images/logo.png" height="100" width="100" alt="School Management System"/>
		</div>
		<br/><br/>
		<ul>
			<li class="manulist">
				<a class ="menulista" href="index.php">Home</a>
				<a class ="menulista" href="manageStudent.php">Gestionar estudiante</a>
				<a class ="menulista" href="manageTeacher.php">Gestionar profesor</a>
				<a class ="menulista" href="course.php">Curso</a>
				<a class ="menulista" href="examSchedule.php">Horarios examen</a>
				<div align="center">
				<h4>Hola!admin <?php echo $check." ";?></h4>
				<a class ="menulista" href="logout.php" onmouseover="changemouseover(this);" onmouseout="changemouseout(this,'<?php echo ucfirst($loged_user_name);?>');"><?php echo "Logout";?></a>
			</li>
		</ul>
		<hr/>
	</body>
</html>