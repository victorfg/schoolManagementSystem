<?php
include_once('../../../service/mysqlConection.php');

$week=$_GET['week'];
$week=stripslashes($week);
if(empty($week)) {
$week = date('Y').'-W'.date('W');
}

$sql = "SELECT * FROM schedule WHERE 
    id_schedule = {$id}";

$result = mysqli_query($link, $sql);
$rows=mysqli_fetch_array($result);
if(empty($idSubject)){
    $idSubject = $rows['id_subject'];
}
if(empty($idCourse)){
    $idCourse = $rows['id_course'];
}

$sqlSubjects = "SELECT * FROM subjects";

$resultSubject = mysqli_query($link, $sqlSubjects);

$sqlCourses = "SELECT * FROM courses";

$resultCourses  = mysqli_query($link, $sqlCourses);

?>
<html>
<head>
  <!-- Custom fonts for this template-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="../../../assets/css/style.css">
  <title>Schedule Template | CodyHouse</title>
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
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
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
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Perfil
              </a>
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
      <div class="justify-content-center">
          <div class="cd-schedule margin-top-lg margin-bottom-lg js-cd-schedule">
              <form action="../schedule/db/insertOrUpdate.php" method="post" style="margin-left: 61px;margin-bottom: 5px;">
                  <input type="week" id="lweek" name="lweek" value="<?php echo $week; ?>">
                  <input type="submit" value="Filtrar">
              </form>
                  <div class="cd-schedule__events">
                      <ul>
                          <li class="cd-schedule__group">
                              <div class="cd-schedule__top-info"><span>Lunes</span></div>

                              <ul>
                                  <li class="cd-schedule__event">
                                      <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                          <em class="cd-schedule__name">Abs Circuit</em>
                                      </a>
                                  </li>
                                  <li class="cd-schedule__event">
                                      <a data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2" href="#0">
                                          <em class="cd-schedule__name">Rowing Workout</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="14:00" data-end="15:15"  data-content="event-yoga-1" data-event="event-3" href="#0">
                                          <em class="cd-schedule__name">Yoga Level 1</em>
                                      </a>
                                  </li>
                              </ul>
                          </li>

                          <li class="cd-schedule__group">
                              <div class="cd-schedule__top-info"><span>Martes</span></div>

                              <ul>
                                  <li class="cd-schedule__event">
                                      <a data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                                          <em class="cd-schedule__name">Rowing Workout</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="11:30" data-end="13:00"  data-content="event-restorative-yoga" data-event="event-4" href="#0">
                                          <em class="cd-schedule__name">Restorative Yoga</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="13:30" data-end="15:00" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                          <em class="cd-schedule__name">Abs Circuit</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3" href="#0">
                                          <em class="cd-schedule__name">Yoga Level 1</em>
                                      </a>
                                  </li>
                              </ul>
                          </li>

                          <li class="cd-schedule__group">
                              <div class="cd-schedule__top-info"><span>Miercoles</span></div>

                              <ul>
                                  <li class="cd-schedule__event">
                                      <a data-start="09:00" data-end="10:15" data-content="event-restorative-yoga" data-event="event-4" href="#0">
                                          <em class="cd-schedule__name">Restorative Yoga</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="10:45" data-end="11:45" data-content="event-yoga-1" data-event="event-3" href="#0">
                                          <em class="cd-schedule__name">Yoga Level 1</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="12:00" data-end="13:45"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                                          <em class="cd-schedule__name">Rowing Workout</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="13:45" data-end="15:00" data-content="event-yoga-1" data-event="event-3" href="#0">
                                          <em class="cd-schedule__name">Yoga Level 1</em>
                                      </a>
                                  </li>
                              </ul>
                          </li>

                          <li class="cd-schedule__group">
                              <div class="cd-schedule__top-info"><span>Jueves</span></div>

                              <ul>
                                  <li class="cd-schedule__event">
                                      <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                          <em class="cd-schedule__name">Abs Circuit</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="12:00" data-end="13:45" data-content="event-restorative-yoga" data-event="event-4" href="#0">
                                          <em class="cd-schedule__name">Restorative Yoga</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="15:30" data-end="16:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                          <em class="cd-schedule__name">Abs Circuit</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="17:00" data-end="18:30"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                                          <em class="cd-schedule__name">Rowing Workout</em>
                                      </a>
                                  </li>
                              </ul>
                          </li>

                          <li class="cd-schedule__group">
                              <div class="cd-schedule__top-info"><span>Viernes</span></div>

                              <ul>
                                  <li class="cd-schedule__event">
                                      <a data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                                          <em class="cd-schedule__name">Rowing Workout</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="12:30" data-end="14:00" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                          <em class="cd-schedule__name">Abs Circuit</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3" href="#0">
                                          <em class="cd-schedule__name">Yoga Level 1</em>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          <li class="cd-schedule__group">
                              <div class="cd-schedule__top-info"><span>Sábado</span></div>

                              <ul>
                                  <li class="cd-schedule__event">
                                      <a data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                                          <em class="cd-schedule__name">Rowing Workout</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="12:30" data-end="14:00" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                          <em class="cd-schedule__name">Abs Circuit</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3" href="#0">
                                          <em class="cd-schedule__name">Yoga Level 1</em>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          <li class="cd-schedule__group">
                              <div class="cd-schedule__top-info"><span>Domingo</span></div>

                              <ul>
                                  <li class="cd-schedule__event">
                                      <a data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                                          <em class="cd-schedule__name">Rowing Workout</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="12:30" data-end="14:00" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                          <em class="cd-schedule__name">Abs Circuit</em>
                                      </a>
                                  </li>

                                  <li class="cd-schedule__event">
                                      <a data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3" href="#0">
                                          <em class="cd-schedule__name">Yoga Level 1</em>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>

                  <div class="cd-schedule-modal">
                      <header class="cd-schedule-modal__header">
                          <div class="cd-schedule-modal__content">
                              <span class="cd-schedule-modal__date"></span>
                              <h3 class="cd-schedule-modal__name"></h3>
                          </div>

                          <div class="cd-schedule-modal__header-bg"></div>
                      </header>

                      <div class="cd-schedule-modal__body">
                          <div class="cd-schedule-modal__event-info"></div>
                          <div class="cd-schedule-modal__body-bg"></div>
                      </div>

                      <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
                  </div>

                  <div class="cd-schedule__cover-layer"></div>
              </div>
        </div> <!-- .cd-schedule -->

        <script src="../../../assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
        <script src="../../../assets/js/main.js"></script>
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