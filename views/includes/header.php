<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Control de asistencia</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?php echo RUTA . 'assets/'; ?>vendor/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo RUTA . 'assets/'; ?>vendor/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo RUTA . 'assets/'; ?>css/style.css">
  <link rel="stylesheet" href="<?php echo RUTA . 'assets/'; ?>css/full-calendar.css">
  <link rel="stylesheet" href="<?php echo RUTA . 'assets/'; ?>vendor/DataTables/datatables.min.css">
  
  <link rel="stylesheet" href="<?php echo RUTA . 'assets/'; ?>css/snackbar.min.css">
  <link rel="stylesheet" href="<?php echo RUTA . 'assets/'; ?>css/jquery-ui.min.css">
  
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo RUTA . 'assets/'; ?>images/tecnm.ico" />
</head>
<body>
  <div class="container-scroller d-flex">
  
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>Navigación</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="plantilla.php">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Panel Principal</span>
            <div class="badge badge-info badge-pill">2</div>
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Componentes</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-admin" aria-expanded="false" aria-controls="ui-basic-admin">
            <i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Administración</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic-admin">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="?pagina=usuarios">Usuarios</a></li>
              <li class="nav-item"> <a class="nav-link" href="?pagina=configuracion">Configuración</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-datos-internos" aria-expanded="false" aria-controls="ui-basic-datos-internos">
            <i class="mdi mdi-shape-plus menu-icon"></i>
            <span class="menu-title">Datos internos</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic-datos-internos">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="?pagina=carreras"> <i class="mdi mdi-view-headline menu-icon"></i> Carreras</a></li>
              <li class="nav-item"> <a class="nav-link" href="?pagina=semestres"> <i class="mdi mdi-tag menu-icon"></i> Semestres</a></li>
              <li class="nav-item"> <a class="nav-link" href="?pagina=asignaturas"> <i class="mdi mdi-book-multiple menu-icon"></i> Asignaturas</a></li>
              <li class="nav-item"> <a class="nav-link" href="?pagina=grupos"> <i class="mdi mdi-group menu-icon"></i> Grupos</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pagina=estudiantes">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title">Estudiantes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pagina=asistencia">
            <i class="mdi mdi-calendar menu-icon"></i>
            <span class="menu-title">Asistencia</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?pagina=reticulas">
            <i class="mdi mdi-folder-outline menu-icon"></i>
            <span class="menu-title">Reticulas</span>
          </a>
        </li>
    
      </ul>
      
        <button id="themeButton">Cambiar Tema (Pendiente de Asignar y posición)</button>
      
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href="plantilla.php"><img src="<?php echo RUTA . 'assets/'; ?>images/logo.svg" width="240" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="plantilla.php"><img src="<?php echo RUTA . 'assets/'; ?>images/logo.svg" width="120" alt="logo"/></a>
          </div>
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Bienvenido al Sistema de control de Asistencia</h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block"><?php echo fechaMexico(); ?></h4>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                <input type="text" id="buscarEstudiante" class="form-control" placeholder="Buscar por matrícula..." aria-label="search" aria-describedby="search">
              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <img src="<?php echo RUTA . 'assets/'; ?>images/avatar.png" alt="profile"/>
                <span class="nav-profile-name"><?php echo $_SESSION['nombre']; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#" onclick="salir()">
                  <i class="mdi mdi-logout text-primary"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
        