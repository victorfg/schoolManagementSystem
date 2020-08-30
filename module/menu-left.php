<?php
$userType = $_SESSION['login_type'];
?>
<?php if($userType==='admin'): ?>
<!-- Nav Item - Tables -->

<li class="nav-item">
    <a class="nav-link" href="../actions/subjects/list.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Asignaturas</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Nav Item - Tables -->
<li class="nav-item">
<a class="nav-link" href="../actions/users/list.php">
<i class="fas fa-fw fa-table"></i>
<span>Usuarios</span></a>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="../actions/enrollment/courses-list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Matriculas</span></a>
    </li>
</li>
<?php endif; ?>
<?php if($userType!=='student'): ?>
<!-- Nav Item - Tables -->

    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="../actions/courses/list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Cursos</span></a>
    </li>
<?php endif; ?>