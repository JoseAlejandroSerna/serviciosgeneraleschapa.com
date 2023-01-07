<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />

    <title>Administrador</title>

    <link rel="stylesheet" href="css/admin/perfect-scrollbar.css">
    <link rel="stylesheet" href="css/admin/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="css/admin/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin/styles.min.css"/>   
    <link rel="stylesheet" href="css/admin/animate.css">
    <!-- Favicons -->
    <?php 
        $vLogo = "";
        foreach($general as $info) {

            if($info->vLogo != ""){ 
                $vLogo = $info->vLogo;
            }
        }
    ?>

    <link rel="shortcut icon" href="<?php echo PATH_RESOURCES_ADMIN;?>logo.ico">
    <link rel="apple-touch-icon" href="<?php echo PATH_RESOURCES_ADMIN.$vLogo;?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo PATH_RESOURCES_ADMIN.$vLogo;?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo PATH_RESOURCES_ADMIN.$vLogo;?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo PATH_RESOURCES_ADMIN.$vLogo;?>">
    <link rel="icon" type="image/x-icon" href="<?php echo PATH_RESOURCES_ADMIN;?>logo.ico" />

    <script src="js/admin/all.min.js"></script>
    <link rel="stylesheet" href="css/admin/line-awesome.min.css">
    <script src="js/admin/feather.min.js"></script>
    <link rel="stylesheet" href="css/admin/apexcharts.css">
    <link rel="stylesheet" href="css/admin/flatpickr.css">
    <link rel="stylesheet" href="css/admin/jquery.toast.min.css">
    <link rel="stylesheet" href="css/admin/jqvmap.css">

    <link rel="stylesheet" href="css/admin/morris.css">
    <link rel="stylesheet" href="css/admin/jquery.dataTables.css">

    <?php if($view == VIEW_ADMIN_SLIDER || $view == CONTROLADOR_ADMIN_PROMOTION){ ?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <?php } ?>
</head>