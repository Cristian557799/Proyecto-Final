<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo $_ENV['host.folder'] ?>" class="nav-link <?php echo $seccion === $_ENV['host.folder'] ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
              </p>
            </a>
          </li> 
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item <?php echo (in_array($seccion, [$_ENV['host.folder'] . 'demo-proveedores'])) ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de control
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $_ENV['host.folder'] ?>demo-proveedores" class="nav-link <?php echo $seccion === $_ENV['host.folder'] . 'demo-proveedores' ? 'active' : ''; ?>">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Demo Proveedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $_ENV['host.folder'] ?>trabajadores" class="nav-link <?php echo $seccion === $_ENV['host.folder'] . 'trabajadores' ? 'active' : ''; ?>">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Trabajadores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $_ENV['host.folder'] ?>proveedores" class="nav-link <?php echo $seccion === $_ENV['host.folder'] . 'proveedores' ? 'active' : ''; ?>">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Proveedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $_ENV['host.folder'] ?>productos" class="nav-link <?php echo $seccion === $_ENV['host.folder'] . 'productos' ? 'active' : ''; ?>">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $_ENV['host.folder'] ?>usuarios_sistema" class="nav-link <?php echo $seccion === $_ENV['host.folder'] . 'usuarios_sistema' ? 'active' : ''; ?>">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Usuarios Sistema</p>
                </a>  
              </li> 
              <li class="nav-item">
              <a href="<?php echo $_ENV['host.folder']; ?>logout" class="nav-link text-danger">
                <i class="fas fa-sign-out-alt"></i>
                <p>Cerrar Sesión</p>
              </a>
              </li>            
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->