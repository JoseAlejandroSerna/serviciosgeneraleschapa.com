<script>
    var varView = '<?php echo $view; ?>';
</script>
<?php if($view == "AdminColor"){ ?>
<script>
    var info_admin_color = '<?php echo json_encode($info_admin_color); ?>';
    var JSON_color = JSON.parse(info_admin_color);
</script>
<?php } ?>
<?php if($view == "AdminUser"){ ?>
<script>
    var all_user = '<?php echo json_encode($all_user); ?>';
    var JSON_all_user = JSON.parse(all_user);
</script>
<?php } ?>
<?php if($view == "AdminProduct"){ ?>
<script>
    var info_admin_product = '<?php echo json_encode($info_admin_product); ?>';
    var JSON_info_admin_product = JSON.parse(info_admin_product);
</script>
<?php } ?>
<?php if($view == "AdminStockProduct" || $view == "AdminSale"){ ?>
<script>
    var info_admin_product = '<?php echo json_encode($info_admin_product); ?>';
    var info_admin_stock_product = '<?php echo json_encode($info_admin_stock_product); ?>';
    var info_admin_branch = '<?php echo json_encode($info_admin_branch); ?>';
    var info_admin_type_product = '<?php echo json_encode($info_admin_type_product); ?>';
    var info_admin_type_purchase = '<?php echo json_encode($info_admin_type_purchase); ?>';
    var info_admin_color = '<?php echo json_encode($info_admin_color); ?>';
    var info_admin_size = '<?php echo json_encode($info_admin_size); ?>';

    var JSON_products = JSON.parse(info_admin_product);
    var JSON_stock_products = JSON.parse(info_admin_stock_product);
    var JSON_branch = JSON.parse(info_admin_branch);
    var JSON_type_products = JSON.parse(info_admin_type_product);
    var JSON_type_purchase = JSON.parse(info_admin_type_purchase);
    var JSON_color = JSON.parse(info_admin_color);
    var JSON_size = JSON.parse(info_admin_size);
</script>
<?php } ?>

<?php
$iSale = "0";
$iRent = "0";
$iMaking = "0";
foreach($info_notifications as $notifications) {
    $iSale      = $notifications->iSale;
    $iRent      = $notifications->iRent;
    $iMaking    = $notifications->iMaking;
}
?>

<aside id="layoutSideLeft_nav">

    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="sidenav-left">
                <div class="nav accordion" id="accordionSidenav">

                    <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("Main","index"); ?>">
                        <div class="nav-link-icon"><i data-feather="airplay"></i></div> Baby Keep
                        <div class="sidenav-collapse-arrow"></div>
                    </a>


                    <!--Gerencia-->
                    <?php if($_SESSION['idPermissions'] == "3"){ ?>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminSale","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Venta
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminRent","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Renta
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminMaking","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Confección
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminCalendar","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Calendario
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminUserTest","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="check"></i></div> Encuentas para usuarios
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminWaitingList","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div> Lista de espera
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminProduct","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="package"></i></div> Productos
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminStockProduct","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="move"></i></div> Stock de productos
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminColor","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="list"></i></div> Lista de colores
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminSize","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="list"></i></div> Lista de tallas
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminCard","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="package"></i></div> Tarjeta club
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminPromotion","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="package"></i></div> Promociones
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminReportSale","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div> Reportes de venta
                            <?php if($iSale > 0){?>
                            <span class="badge badge-primary ml-4 waves-effect waves-dark badge-pill"><?php echo $iSale; ?></span>
                            <?php }?>
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminReportRent","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div> Reportes de renta
                            <?php if($iRent > 0){?>
                            <span class="badge badge-primary ml-4 waves-effect waves-dark badge-pill"><?php echo $iRent; ?></span>
                            <?php }?>
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminReportMaking","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div> Reportes de confección
                            <?php if($iMaking > 0){?>
                            <span class="badge badge-primary ml-4 waves-effect waves-dark badge-pill"><?php echo $iMaking; ?></span>
                            <?php }?>
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                    <?php } ?>


                    <!--Ventas-->
                    <?php if($_SESSION['idPermissions'] == "4"){ ?>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminSale","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Venta
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminRent","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Renta
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminMaking","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Confección
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminCalendar","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Calendario
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminWaitingList","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div> Lista de espera
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminProduct","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="package"></i></div> Productos
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminStockProduct","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="move"></i></div> Stock de productos
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminColor","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="list"></i></div> Lista de colores
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminSize","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="list"></i></div> Lista de tallas
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminCard","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="package"></i></div> Tarjeta club
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminPromotion","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="package"></i></div> Promociones
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                    <?php } ?>




                    <!--Administrador-->
                    <?php if($_SESSION['idPermissions'] == "2"){ ?>

                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminSale","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Venta
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminRent","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Renta
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminMaking","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Confección
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminCalendar","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="airplay"></i></div> Calendario
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminUserTest","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="check"></i></div> Encuentas para usuarios
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminReportSale","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div> Reportes de venta
                            <?php if($iSale > 0){?>
                            <span class="badge badge-primary ml-4 waves-effect waves-dark badge-pill"><?php echo $iSale; ?></span>
                            <?php }?>
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminReportRent","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div> Reportes de renta
                            <?php if($iRent > 0){?>
                            <span class="badge badge-primary ml-4 waves-effect waves-dark badge-pill"><?php echo $iRent; ?></span>
                            <?php }?>
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminReportMaking","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div> Reportes de confección
                            <?php if($iMaking > 0){?>
                            <span class="badge badge-primary ml-4 waves-effect waves-dark badge-pill"><?php echo $iMaking; ?></span>
                            <?php }?>
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <div class="sidenav-menu-heading">-- Altas y bajas </div>

                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminBranch","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="map-pin"></i></div> Sucursales
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminUser","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="user"></i></div> Usuarios
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminWaitingList","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div> Lista de espera
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminProduct","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="package"></i></div> Productos
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminStockProduct","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="move"></i></div> Stock de productos
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminColor","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="list"></i></div> Lista de colores
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminSize","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="list"></i></div> Lista de tallas
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminCard","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="package"></i></div> Tarjeta club
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminPromotion","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="package"></i></div> Promociones
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminQuiz","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="check"></i></div> Encuentas
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                        <a class="waves-effect waves-dark nav-link" href="<?php echo $helper->url("AdminSetting","index"); ?>">
                            <div class="nav-link-icon"><i data-feather="tool"></i></div> Sitio web
                            <div class="sidenav-collapse-arrow"></div>
                        </a>
                    <?php } ?>

                </div>
            </div>
        </div>
    </nav>
</aside>