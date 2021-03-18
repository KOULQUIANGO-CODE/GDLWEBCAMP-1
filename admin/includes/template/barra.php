  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin-area.php" class="nav-link">Inicio</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar..." aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
       <!-- Ajustes Dropdown Menu -->
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-cog"></i>
     
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Ajustes</span>
          <div class="dropdown-divider"></div>
          <a href="editar-admin.php?id=<?php echo $_SESSION['id']?>" class="dropdown-item">
          <i class="fas fa-user"></i>
          <span class="float-right">Información del Usuario</span> 
          </a>
          <div class="dropdown-divider"></div>
          <a href="login.php?cerrar_session=true" class="dropdown-item">
          <i class="fas fa-sign-out-alt"></i>
          <span class="float-right">Cerrar Sesión</span>  
            
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->