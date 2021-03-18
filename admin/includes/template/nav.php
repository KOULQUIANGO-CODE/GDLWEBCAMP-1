  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="admin-area.php" class="brand-link">
          <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">GDLWEBCAMP</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
              <div class="image">
                  <img src="img/avatar5.png" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="admin-area.php" class="d-block"><?php echo $_SESSION['nombre']?></a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Buscar..."
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview"
                  role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-header">Menú de Administración</li>
                  <!-- Dashboard -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li><!-- Fin Dashboard -->
                  <!-- Eventos -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-calendar-check"></i>
                          <p>
                              Eventos

                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                      <!-- Ver Todos -->
                          <li class="nav-item">
                              <a href="lista-evento.php" class="nav-link">
                                  <i class="fas fa-list nav-icon"></i>
                                  <p>Ver Todos</p>
                              </a>
                          </li><!-- Fin Ver Todos -->
                          <!-- Agregar -->
                          <li class="nav-item">
                              <a href="crear-evento.php" class="nav-link">
                                  <i class="fas fa-plus-circle nav-icon"></i>

                                  <p>Agregar</p>
                              </a>
                          </li><!-- Fin agregar -->

                      </ul>
                  </li>
                  <!-- Categoría Eventos -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Categoría Eventos
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                      <!-- Ver Todos -->
                          <li class="nav-item">
                              <a href="lista-categoria.php" class="nav-link">
                                  <i class="fas fa-list nav-icon"></i>
                                  <p>Ver Todos</p>
                              </a>
                          </li><!-- Fin Ver Todos -->
                          <!-- Agregar -->
                          <li class="nav-item">
                              <a href="crear-categoria.php" class="nav-link">
                                  <i class="fas fa-plus-circle nav-icon"></i>

                                  <p>Agregar</p>
                              </a>
                          </li><!-- Fin agregar -->

                      </ul>
                  </li><!-- Fin categoría Eventos -->
                  <!-- Invitados -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Invitados
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                      <!-- Ver Todos -->
                          <li class="nav-item">
                              <a href="lista-invitado.php" class="nav-link">
                                  <i class="fas fa-list nav-icon"></i>
                                  <p>Ver Todos</p>
                              </a>
                          </li><!-- Fin Ver Todos -->
                          <!-- Agregar -->
                          <li class="nav-item">
                              <a href="crear-invitado.php" class="nav-link">
                                  <i class="fas fa-plus-circle nav-icon"></i>

                                  <p>Agregar</p>
                              </a>
                          </li><!-- Fin agregar -->

                      </ul>
                  </li><!-- Fin invitados -->
                  <!-- Registrados -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-address-card"></i>
                          <p>
                              Registrados
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                      <!-- Ver Todos -->
                          <li class="nav-item">
                              <a href="lista-registrado.php" class="nav-link">
                                  <i class="fas fa-list nav-icon"></i>
                                  <p>Ver Todos</p>
                              </a>
                          </li><!-- Fin Ver Todos -->
                          <!-- Agregar -->
                          <li class="nav-item">
                              <a href="crear-registrado.php" class="nav-link">
                                  <i class="fas fa-plus-circle nav-icon"></i>

                                  <p>Agregar</p>
                              </a>
                          </li><!-- Fin agregar -->

                      </ul>
                  </li><!-- Fin Registrados -->

                    <!-- Administradores -->
                    <?php if($_SESSION['nivel'] === 1){?>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Administradores
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                      <!-- Ver Todos -->
                          <li class="nav-item">
                              <a href="lista-admin.php" class="nav-link">
                                  <i class="fas fa-list nav-icon"></i>
                                  <p>Ver Todos</p>
                              </a>
                          </li><!-- Fin Ver Todos -->
                          <!-- Agregar -->
                          <li class="nav-item">
                              <a href="crear-admin.php" class="nav-link">
                                  <i class="fas fa-plus-circle nav-icon"></i>

                                  <p>Agregar</p>
                              </a>
                          </li><!-- Fin agregar -->

                      </ul>
                  </li><!-- Fin Administradores -->
                  <?php }?>
                  <!-- Testimoniales -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-comments"></i>
                          <p>
                              Testimoniales
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                      <!-- Ver Todos -->
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-list nav-icon"></i>
                                  <p>Ver Todos</p>
                              </a>
                          </li><!-- Fin Ver Todos -->
                          <!-- Agregar -->
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fas fa-plus-circle nav-icon"></i>

                                  <p>Agregar</p>
                              </a>
                          </li><!-- Fin agregar -->

                      </ul>
                  </li><!-- Fin Testimoniales -->

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>