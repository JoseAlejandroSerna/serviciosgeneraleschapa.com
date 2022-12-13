<html lang="en">
    <?php include('headerAdmin.php') ?>

	<body style="position: relative;" data-spy="scroll" data-offset="5" data-target="#XScrollspy" class="nav-fixed">

        <?php include('preload_header.php') ?>

        <div id="layoutSidenav">

            <?php include("menuAdmin.php");?>

            <div id="layoutMain_content">
                <main>
                    <div class="pb-10  bg-lineGradient">
                        <div class="container-fluid">
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="container-fluid mt-n10 ">
                        <div class="svgStyle toppadding50 bottompadding50">
                            <div class="row margin-bottom">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class=" col-sm-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="card shadow margin-bottom">
                                                <div class="card-body">
                                                    <h3 class="font-weight-bold">¡Bienvenido <?php echo $_SESSION['vUser'];?>!</h3>
                                                    <div class="margin-bottom ">
                                                        <div class="row">
                                                            <div class="col-12 mb-3">
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->

                </main>
            </div>
        </div>

        <?php include('footerAdmin.php') ?>

	</body>
</html>