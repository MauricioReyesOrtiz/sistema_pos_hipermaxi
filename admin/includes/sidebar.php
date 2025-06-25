<div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Inicio</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Interface</div>

                    <!-- categorias -->
                    <a class="nav-link collapsed" href="#" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Categorias
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="categories-create.php">Crear Categoria</a>
                            <a class="nav-link" href="categories.php">Ver Categoria</a>
                        </nav>
                    </div>

                    <!-- productos -->
                    <a class="nav-link collapsed" href="#" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Productos
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="categories-create.php">Crear Producto</a>
                            <a class="nav-link" href="categories.php">Ver Producto</a>
                        </nav>
                    </div>

                    


                    <div class="sb-sidenav-menu-heading">Administrar usuarios</div>

                    <a class="nav-link collapsed" href="#" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapseAdmins" 
                        aria-expanded="false" aria-controls="collapseAdmins">

                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Administradores
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseAdmins" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="admins-create.php">Añadir Administrador</a>
                            <a class="nav-link" href="admins.php">Ver Administradores</a>
                        </nav>
                    </div>
                    
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logueado como:</div>
                Administrador
            </div>
        </nav>
</div>