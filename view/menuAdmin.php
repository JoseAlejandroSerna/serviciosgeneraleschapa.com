<script>
    var varView = '<?php echo $view; ?>';
</script>

<aside id="layoutSideLeft_nav">

    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="sidenav-left">
                <div class="nav accordion" id="accordionSidenav">

                    <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url(CONTROLADOR_MAIN,ACCION_INDEX); ?>">
                        <div class="nav-link-icon"><i data-feather="airplay"></i></div> Sitio web
                        <div class="sidenav-collapse-arrow"></div>
                    </a>

                    <div class="sidenav-menu-heading">-- Configuración sitio web </div>

                    <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url(CONTROLADOR_ADMIN_GENERAL,ACCION_INDEX); ?>">
                        <div class="nav-link-icon"><i data-feather="tool"></i></div> Informacion General
                        <div class="sidenav-collapse-arrow"></div>
                    </a>
                    
                    <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url(CONTROLADOR_ADMIN_SLIDER,ACCION_INDEX); ?>">
                        <div class="nav-link-icon"><i data-feather="tool"></i></div> Carrusel
                        <div class="sidenav-collapse-arrow"></div>
                    </a>

                    <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url(CONTROLADOR_ADMIN_PROMOTION,ACCION_INDEX); ?>">
                        <div class="nav-link-icon"><i data-feather="package"></i></div> Promociones
                        <div class="sidenav-collapse-arrow"></div>
                    </a>

                    <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url(CONTROLADOR_ADMIN_SERVICE,ACCION_INDEX); ?>">
                        <div class="nav-link-icon"><i data-feather="package"></i></div> Servicios
                        <div class="sidenav-collapse-arrow"></div>
                    </a>
                    <!--<a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url(CONTROLADOR_ADMIN_USER,ACCION_INDEX); ?>">
                        <div class="nav-link-icon"><i data-feather="user"></i></div> Usuarios
                        <div class="sidenav-collapse-arrow"></div>
                    </a>-->

                </div>
            </div>
        </div>
    </nav>
</aside>