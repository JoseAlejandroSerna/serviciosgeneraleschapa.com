<!-- Pre load -->
<div class="preLoader">
    <div class="loader-grew"></div>
    <div class="loaderText justify-content-center">MD Technology</div>
</div>
<!-- Pre load -->

<!--Header--->
<header>
    <nav class="topnav navbar shadow navbar-expand navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand d-none d-sm-block " href="index.php"><?php echo $_SESSION['vUser'];?></a>
        <a type="button" id="sidebarToggleTop" class="waves-effect waves-dark btn">
            <span class="h5">
                <i class="fa fa-server"></i>
            </span>
        </a>

        <ul class="navbar-nav align-items-center ml-auto">
            <!-- Nav Item - User   -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="img-profile rounded-circle" src="/assets/images/branch/logo.png">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right navbar-growIn" aria-labelledby="userDropdown">
                    <a class="waves-effect waves-dark dropdown-item waves-effect waves-dark" href="<?php echo $helper->url(CONTROLADOR_ADMIN,ACTION_LOGOUT); ?>">
                        <div class="d-flex">
                            <div class="mr-2">
                                <i data-feather="log-out"> </i>
                            </div>
                            <p class="align-self-center mb-0">Salir</p>
                        </div>
                    </a>	
                </div>
            </li>
        </ul>
    </nav>
</header>
<!---->