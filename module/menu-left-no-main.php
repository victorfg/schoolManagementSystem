<?php
 $userType = $_SESSION['login_type'];
?>
<?php if($userType==='admin'): ?>
    <!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="../subjects/list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Asignaturas</span></a>
</li>

    <hr class="sidebar-divider d-none d-md-block">
<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="../courses/list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Cursos</span></a>
</li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="../users/list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Usuarios</span></a>
    </li>
<?php endif; ?>
<?php if($userType!=='student'): ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="../enrollment/courses-list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Matriculas</span></a>
    </li>
<?php endif; ?>