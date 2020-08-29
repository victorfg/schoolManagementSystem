<?php
    include_once('../../../service/mysqlConection.php');
    if($_SESSION['login_type']!=='admin' || empty($_SESSION['login_type'])){
        echo "no tienes acceso";
        return;
    }
    $check=$_SESSION['login_id'];
    $id=$_GET['id'];
    $idStudent=$_GET['idStudent'];
    $idCourse=$_GET['idCourse'];

    $id=stripslashes($id);
    $idStudent=stripslashes($idStudent);
    $idCourse=stripslashes($idCourse);

    $specified = !empty($id);
    if($specified) {
        $sql = "SELECT * FROM enrollments WHERE 
        id = {$id}";
    }

    $result = mysqli_query($link, $sql);
    $rows=mysqli_fetch_array($result);


    $sqlStudents = "SELECT * FROM users WHERE 
    type = 'student'";


    $resultStudent = mysqli_query($link, $sqlStudents);
    $rowsStudents=mysqli_fetch_array($resultStudent);


    $sqlCourses = "SELECT * FROM courses";


    $resultCourses = mysqli_query($link, $sqlCourses);
    $rowsCourses=mysqli_fetch_array($resultCourses);
?>


<html>
    <head>
		<!-- Custom fonts for this template-->
		<link href="../../../source/fonts/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="../../../source/css/bootstrap-admin-theme.css">
        <link rel="stylesheet" type="text/css" href="../../../source/css/fonts.css">
        <link rel="stylesheet" type="text/css" href="../../../source/css/main-classes.css">
		<script src = "JS/login_logout.js"></script>
	</head>
	<body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="sidebar-brand-text mx-3">School System </div>
            </a>
            <?php include '../../menu-left-no-main.php';?>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <h1 class="justify-content-center-100">Matriculas</h1>
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $check." ";?></span>
                        <img class="img-profile rounded-circle" src="https://icon-library.net/images/google-user-icon/google-user-icon-12.jpg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                        </a>
                    </div>
                    </li>

                </ul>

                </nav>
                <!-- End of Topbar -->
                <div id="content" class="justify-content-center">
                    <form action="../enrollment/db/insertOrUpdate.php" method="post">
                        <label class="display-none" for="lid">id:</label>
                        <input class="display-none" type="text" id="lid" name="lid" value="<?php echo $rows['id_enrollment']; ?>"><br><br>
                        <select id="lidcourse" name="lidcourse">
                            <?php while($rowsCourses = mysqli_fetch_array($resultCourses)): ?>
                                <?php
                                $selected = $rowsCourses['id_course']==$idCourse?"selected=\"selected\"":"";
                                ?>
                                <option value="<?php echo $rowsCourses['id_course']; ?>"><?php echo $rowsCourses['name']; ?></option>
                            <?php endwhile; ?>
                        </select><br><br>
                        <select id="lidstudent" name="lidstudent">
                            <?php while($rowsStudents = mysqli_fetch_array($resultStudent)): ?>
                                <?php
                                    $selected = $rowsStudents['id']==$idStudent?"selected='selected'":'';
                                ?>
                                <option value="<?php echo $rowsStudents['id']; ?>" <?php echo $selected; ?>><?php echo $rowsStudents['username']; ?></option>
                            <?php endwhile; ?>
                        </select><br><br>
                        <label for="lactive">Activado:</label>
                        <input type="checkbox" id="lactive" name="lactive" <?php echo $rows['active']===1?'checked':'' ?>"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
            <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->

        </div>
            <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preparado para salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Selecciona "Logout" si quieres salir de la sesión.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>